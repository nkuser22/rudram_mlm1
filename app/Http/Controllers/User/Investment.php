<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DatabaseModel;
use App\Models\UserWallet;
use App\Models\User;
use App\Models\Profile;
use App\Models\Order;
use App\Models\Pin;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Rules\WalletUseable;
use App\Rules\WalletBalance;
use App\Rules\AlreadyTopup;
use App\Rules\ValidPackage;
use Illuminate\Support\Facades\DB;
class Investment extends Controller
{
    function index(){
        $userid = auth()->id();
        $currency = (new DatabaseModel)->websiteInfo('currency');
        $orders = (new Order)->getPurchaseOrders($userid);
        $totalPackage = (new Order)->getPurchaseOrderSum($userid);
        $totalBv = (new Order)->package($userid);
        return view("user.pages.package.topuplist",compact('orders','totalPackage','totalBv','currency'));
    }


    public function create()
    {
        $Conn = new DatabaseModel();
        $userid = auth()->id();

        $currency=$Conn->websiteInfo('currency');

		$available_wallets=$Conn->setting('invest_wallets');

        $pinDetails = DB::table('pin_details')
        ->select('pin_rate', 'pin_type')
        ->get();

        
    
        return view('user.pages.package.topup',compact('available_wallets','userid','currency','pinDetails'));
    }


    // Store a new addpackages
    public function buypackages(Request $request)
    {
		

       $Conn = new DatabaseModel();
	   $userid = auth()->id();
       $invoiceNo = Order::generateInvoiceNo();
       $wlt=$request->post('selected_wallet');
       $username=$request->post('username');
       $pinType=$request->post('selected_pin');
       $wallet = new UserWallet();
	   $userWallet=$wallet->getWallet($userid,$wlt);

       $request->validate([
            'selected_wallet' => ['required', new WalletUseable , new WalletBalance],
            'selected_pin' => ['required','string','exists:pin_details,pin_type',new ValidPackage],
            'username' => ['required','string','exists:users,username',new AlreadyTopup($username)],
        ]);

        

        $user = new User();
        $profile = new Profile();
        $pin = new Pin();
        $activeId = $user->getActiveID();
        $tx_uid=$profile->getIdByUsername($username);
        $sponsorInfo=$profile->sponsorInfo($tx_uid);
       

        $packageDetail=$pin->getPinDetails($pinType);
        $formattedDate = Carbon::now()->format('Y-m-d H:i:s');

        $order = new Order();
        $order->u_code=$tx_uid;
        $order->order_type='purchase';
        $order->order_amount=$packageDetail->pin_rate;
        $order->order_bv=$packageDetail->business_volumn;
        $order->pv=$packageDetail->pv;
        $order->status='0';
        $order->invoice_no=$invoiceNo;
        $order->payment_option=$wlt;
        if($order->save()){
          
           // Update the user's details
           $user = User::findOrFail($tx_uid);
           $user->active_id = $activeId;
           $user->active_status = 1;
           $user->active_date = $formattedDate;
           $user->save();

           // Update user wallets
           $userWallet = UserWallet::where('u_code',$tx_uid)->first();
           if ($userWallet) {
               $userWallet->active_id = $activeId;
               $userWallet->save();
           }

        

        if ($Conn->setting('topup_type') == 'amount') {
            $openWallet = $wallet->getWallet($userid,$wlt);
            $closingWallet = $openWallet - $packageDetail->pin_rate;

            // Create the transaction record
            $transaction = new Transaction();
            $transaction->u_code = $userid;
            $transaction->tx_u_code = $tx_uid;
            $transaction->tx_type = "topup";
            $transaction->debit_credit = "debit";
            $transaction->wallet_type = $wlt;
            $transaction->amount =$packageDetail->pin_rate;
            $transaction->date = $formattedDate;
            $transaction->status = 1;
            $transaction->open_wallet = $openWallet;
            $transaction->closing_wallet = $closingWallet;
            $transaction->remark = "$username topup $tx_uid of amount {$packageDetail->pin_rate}";

            if ($transaction->save()) {

                $wallet = new UserWallet();
                $wallet->addAmount($userid,$wlt, -$packageDetail->pin_rate);
               
            }

        }
        if($sponsorInfo){
           $updateWallet = new UserWallet();
           $updateWallet->activeDirect($sponsorInfo->id);  
           $updateWallet->addGen($sponsorInfo->id); 
           
        }


    }

        $msg = "Hello, {$username}. The '{$packageDetail->pin_type}' package has been submitted successfully.";
        $request->session()->flash('success', $msg);
        return redirect('user-packages/create');
       
    }


        public function verifyUsername(Request $request)
    {
        $username = $request->input('username');
        
        if (User::where('username', $username)->exists()) {
            return response()->json(['error' => false, 'msg' => 'Userid is available.']);
        } else {
            
            return response()->json(['error' => true, 'msg' => 'Userid not exists.']);
        }
    }



   

}
