<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Validator;
use App\Rules\CheckWallet; 


   
class CheckoutController extends Controller
{
    public function index(){
		 // Retrieve the user ID from the session
		$userId = session('user_id'); 

		if ($userId) {
			
			// Use the user ID to fetch user data from the database
		$user = User::find($userId);
			
		$cart = session('cart', []); // Retrieve the cart from session
		
        $subtotal = collect($cart)->sum(function ($item) {
            return $item['sale_price'] * $item['product_qty'];
        });	
			
		   return view('front.pages.checkout',compact('cart', 'subtotal','user'));
		} else {
			
			
			return redirect()->route('login');
		}
		
		
		$cart = session('cart', []); 
		
        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['product_qty'];
        });
		
		
	}
	
	
	 // Process the checkout
    public function process(Request $request)
    {
		
		$paymentMethod = $request->input('flexRadioDefault');
		
		 
		
		if($paymentMethod=='shopping_wallet'){
        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:500',
			'total_amount' => 'required|numeric|min:0',
			'wallet_type' => ['required', function ($attribute, $value, $fail) {
                // Check if the user has sufficient balance in their wallet
              $wallet = new UserWallet();
			  $userId = session('user_id'); 
		      $userWallet=$wallet->getWallet($userId,'shopping_wallet');
		  
			if (!$userWallet || $userWallet < $value) {
				// If wallet balance is less than the required amount, return validation error
				$fail('Insufficient funds in your wallet.');
			}
            }],
			
		]);
		}else{
		 // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:500',
			'total_amount' => 'required|numeric|min:0',
			
			
		]);
			
		}

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve the cart from session
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Process payment (dummy example)
        //$paymentStatus = $this->processPayment($request->payment_method, $request->all());

       // if (!$paymentStatus['success']) {
       //     return redirect()->back()->with('error', 'Payment failed: ' . $paymentStatus['message']);
       // }

        // Save the order to the database (dummy implementation)
        $orderId = $this->saveOrder($request, $cart);

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('checkout.success', ['order_id' => $orderId])
            ->with('success', 'Order placed successfully!');
    }

    // Show the success page
    public function success($orderId)
	
    {
        return view('front.pages.order_success', compact('orderId'));
    }

    // Dummy function to process payment
    private function processPayment($method, $data)
    {
        if ($method === 'card') {
            return ['success' => true, 'message' => 'Card payment processed successfully.'];
        } elseif ($method === 'paypal') {
            return ['success' => true, 'message' => 'PayPal payment processed successfully.'];
        }

        return ['success' => true, 'message' => 'Cash on delivery selected.'];
    }

    // Dummy function to save order
    private function saveOrder($request, $cart)
    {    
	    
	
    $userId = session('user_id'); 
	$invoiceNo = Order::generateInvoiceNo();
	$pro_id=array_column($cart, 'product_id');
	$totalAmount = $request->input('total_amount');
    $paymentMethod = $request->input('flexRadioDefault');
    $wlt = '';
    if ($paymentMethod == 'shopping_wallet') {
        $wlt = 'Shopping Wallet';
    } elseif ($paymentMethod == 'upi_wallet') {
        $wlt = 'UPI';
    } elseif ($paymentMethod == 'cashon_wallet') {
        $wlt = 'Cash on Delivery';
    }
	
    $orderData = [
	    'product_id' => $pro_id,
		'product_name' => array_column($cart, 'product_name'),
		'price' => array_column($cart, 'price'),
		'sale_price' => array_column($cart, 'sale_price'),
		'product_qty' => array_column($cart, 'product_qty'),
		'product_img' => array_column($cart, 'product_img'),
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'address' => $request->input('address'),
        'city' => $request->input('city'),
        'state' => $request->input('state'),
        'pin_code' => $request->input('pin_code'),
		
		
    ];
    
    
    $order = new Order();
	$order->u_code=$userId;
	$order->order_type='purchase';
	$order->order_amount=$totalAmount;
	$order->payment_status='1';
	$order->invoice_no=$invoiceNo;
	$order->payment_option=$wlt;
    $order->order_details = json_encode($orderData);
    $order->save();
	
	
 // Insert into `order_items` table
	
	 // Insert into order_items table
        foreach ($cart as $item) {
            DB::table('order_items')->insert([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['product_qty'],
                'price' => $item['sale_price'],
				'product_img' => $item['product_img'],
				'product_name' => $item['product_name'],
                
            ]);
        }
		
		
  // Insert into `shipping_addresses` table
        DB::table('shipping_addresses')->insert([
            'order_id' => $order->id,
            'name' => $request->input('name'),
            'address_line1' => $request->input('address'),
            'email' => $request->input('email'),
           
        ]);

	
	
	
	// transaction entry
    if(!empty($order->id)){
	 $this->saveTransaction($order,$paymentMethod);
    }
   
    return $order->id;
	
    }
	
     // Function to save transaction entry
	private function saveTransaction($order,$paymentMethod)
	{
		$transaction = new Transaction();
		$transaction->u_code = $order->u_code; 
		$transaction->tx_type ='product_purchase';
		$transaction->date = date('Y-m-d H:i:s');
		$transaction->debit_credit = 'debit';
        $transaction->wallet_type = 'shopping_wallet';		
		$transaction->amount = $order->order_amount;
		$transaction->tx_record = $order->id;
		$transaction->status = '1';
		$transaction->remark = 'Purchase products of amount ' .$order->order_amount.' Order ID: ' . $order->id . ' - Invoice No: ' . $order->invoice_no; 
		$transaction->save();
		
		if ($paymentMethod == 'shopping_wallet') {
			$wallet = new UserWallet();
            $wallet->addAmount($order->u_code,'shopping_wallet', -$order->order_amount);

        } 
		
	}
	
	
	
		
	

	
}
