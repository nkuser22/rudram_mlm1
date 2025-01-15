<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Useraccounts;
use App\Models\Companypaymethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class UseraccountsController extends Controller
{
   
    public function index()
    {
    
  
      $user_id = auth()->id();
  
    $companyPaymentMethods = Companypaymethod::where('status', 1)->get();
    
    $fields = [];
    foreach ($companyPaymentMethods as $paymentMethod) {
        $fields[$paymentMethod->unique_name] = json_decode($paymentMethod->fields_required, true);
    }

   return view('user.pages.payment.create', compact('companyPaymentMethods','fields','user_id'));
    
    }

   
    public function getSection(Request $request)
    {
     
         $paymentType = $request->input('acc_type');
      
        $methodDetailsArr = DB::table('companypaymethods')
            ->where('status', 1)
            ->where('unique_name', $paymentType)
            ->first();
        $methodDetails = $methodDetailsArr && !empty($methodDetailsArr->fields_required)
            ? json_decode($methodDetailsArr->fields_required, true)
            : false;
            
       
        return view('user.pages.payment.payment_section',compact('methodDetails'));
    }
    


    public function store(Request $request){

        

        $userId = auth()->id();
        $validator = Validator::make($request->all(), [
            'account_type' => 'required',
        ]);

        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $payment_type = $request->input('account_type');
        $method_details_arr = Companypaymethod::where('status', 1)
            ->where('unique_name', $payment_type)
            ->first();
        
        
        $method_details = $method_details_arr && !empty($method_details_arr->fields_required) 
            ? json_decode($method_details_arr->fields_required, true) 
            : false;

        
        if ($method_details) {
            foreach ($method_details as $_key => $method_detail) {
                $validator->after(function ($validator) use ($_key, $method_detail) {
                    $validator->addRules([
                        "account.$_key" => 'required',
                    ]);
                });
            }
        }

       
        if ($validator->passes()) {
           
            $userPaymentMethod = Useraccounts::where('u_code', $userId)->first();

            if ($userPaymentMethod) {
               
                $acc = !empty($userPaymentMethod->accounts) ? json_decode($userPaymentMethod->accounts, true) : [];
                $account_details = $request->input('account');
                $account_details['account_type'] = $payment_type;
                $acc[] = $account_details;

              
                $update = [
                    'accounts' => json_encode($acc),
                    'default_account' => 0, 
                ];

               
                $userPaymentMethod->update($update);
                $userAccountData = [
                    'account_type' => $payment_type,
                    'status' => 1,  
                ];
                
                
                Useraccounts::updateOrCreate(
                    ['u_code' => $userId],  
                    $userAccountData       
                ); 
                $msg = "Payment method updated successfully.";
            } else {
                
                $acc = [];
                $account_details = $request->input('account');
                $account_details['account_type'] = $payment_type;
                $acc[] = $account_details;

                // Prepare insert data for user_payment_methods table
                $update = [
                    'accounts' => json_encode($acc),
                    'u_code' => $userId,
                    'status' => 1,
                ];

                // Insert the new payment method for the user
                Useraccounts::create($update);
                $msg = "Payment method Added successfully.";
            }

            // Step 7: Insert data into 'useraccounts' table
            

             
             $request->session()->flash('success', $msg);
             return redirect('user-accounts');

          
        }

       
        return back()->withErrors($validator)->withInput();
    }



    
public function defaultAccount(Request $request,$id){
    $u_code = auth()->id();
    if($id){
        $default=$id-1;
       // Assuming $default and $u_code are already defined
       $update = ['default_account' => $default];
       DB::table('useraccounts')
      ->where('u_code', $u_code)
      ->update($update);
    // Get the previous URL and redirect to it
        

    return redirect()->back();

    }
    
  
}



public function addDelete(Request $request,$id){
   
    $u_code = auth()->id();
    if ($id) {
        $default = $id - 1;
        
        // Fetch the user account
        $checkUserAccount = DB::table('useraccounts')
            ->where('u_code', $u_code)
            ->first();
          
        if ($checkUserAccount) {
            // Decode accounts JSON
            $accounts = !empty($checkUserAccount->accounts) 
                ? json_decode($checkUserAccount->accounts, true) 
                : [];
    
            // Remove the specified account
            unset($accounts[$default]);
    
            // Update the database with modified accounts
            DB::table('useraccounts')
                ->where('u_code', $u_code)
                ->update([
                    'accounts' => json_encode($accounts),
                ]);
        }
    
        // Redirect to the current URI
        return redirect()->back();

    }

}



    
}
