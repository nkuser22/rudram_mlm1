<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FundController extends Controller
{
   
    public function index()
    {
		
		$userId = auth()->id();
        $fundRequests = Transaction::where('u_code', $userId)
			->orderBy('created_at', 'desc')
			->get();
			
			
		 $paymentMethods = DB::table('payment_method')
            ->where('status', '1')
            ->get();	
       
        return view('user.pages.fund.fund_request', compact('fundRequests','paymentMethods'));
    }

    
    public function show($id)
    {
		 
        $fundRequest = Transaction::findOrFail($id);
         
        return view('user.pages.fund.fund_request_history', compact('fundRequest'));
    }
	
	public function fundRequestHistory(){
		
		$userId = auth()->id();
        $fundRequest = Transaction::where('u_code', $userId)
		    ->where('tx_type', 'fundRequest') 
			->orderBy('date', 'desc')
			->get();
			
		return view('user.pages.fund.fund_request_history', compact('fundRequest'));
	}

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $fundRequest = Transaction::findOrFail($id);
        $fundRequest->status = $request->status;
        $fundRequest->save();

        return redirect()->back()->with('success', 'Fund request status updated successfully.');
    }

    // Allow users to create a new fund request
    public function create()
    {
        return view('user.funds.create');
    }

    
    public function store(Request $request)
    {
		
		
        $request->validate([
            'amount' => 'required|numeric|min:1',
			'payment_method' => 'required',
			'payment_type' => 'required',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			
        ]);
		
		// Upload image if provided
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$path = $file->store('payment', 'public'); 
			$payment_image= $path;
		}
		$payment_type=$request->payment_type;
		$remark='Fund request by user.';
        $res=Transaction::create([
            'u_code' => Auth::id(),
            'payment_method' => $request->payment_method,
			'payment_type' => $payment_type,
			'amount' => $request->amount,
            'status' => '0',
            'wallet_type' => 'fund_wallet',
			'txn_id' => $request->txn_id,
			'payment_slip' => $payment_image,
			'tx_type' => 'fundRequest',
			'date' => date('Y-m-d H:i:s'),
			'remark' => $remark
			
        ]);
       
        $msg='Fund request submitted successfully.';
		$request->session()->flash('success',$msg);
        return redirect('user-funds');
        
    }



  public function getPaymentMethod(Request $request)
{
		
	
        // Get the connection type from the request
       $type = $request->input('connection_type');
       
        // Fetch payment methods for the given parent method (using Query Builder)
        $paymentMethods = DB::table('payment_method')
                            ->where('parent_method', $type)
                            ->get();

        // Initialize response
        $res = '';

        if ($paymentMethods->isNotEmpty()) {
            $res .= '<option value="">Select</option>';
            foreach ($paymentMethods as $method) {
                $res .= '<option value="' . $method->slug . '">' . $method->name . '</option>';
            }
        }

        // Return the response
       echo $res;
    }
	
	public function getPaymentMethodImage(Request $request)
    {
        // Get the connection type from the request
        $type = $request->input('connection_type');
        
        // Initialize the response array
        $res = ['error' => true];

        // Query the payment method based on the slug (connection_type)
        $paymentMethod = DB::table('payment_method')
            ->where('slug', $type)
            ->first();

        // Check if a payment method was found
        if ($paymentMethod) {
            // Prepare the response data
            $res['address'] = $paymentMethod->address;
            $res['msg'] = $paymentMethod->image;
            $res['error'] = false;
        }

        // Return the response as JSON
         print_r(json_encode($res));
    }

}
