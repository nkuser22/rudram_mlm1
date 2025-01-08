<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Popup;
use App\Models\DatabaseModel;
use Illuminate\Support\Carbon;
use App\Models\WalletType;
use App\Models\UserWallet;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(){
		
	$user = Auth::user();	
	$userId = auth()->id();	
	$wallet = new UserWallet();
    $popup = Popup::latest()->first(); 
	$Conn = new DatabaseModel();
	$currency=$Conn->websiteInfo('currency');
	$total_amt=Order::sum('order_amount');
	$total_order=Order::count();
	$todayTotal = Order::whereDate('created_at', Carbon::today())
                        ->sum('order_amount');
						
    $usersWallets = WalletType::where('wallet_type', 'wallet')
		->where('status', 1)
		->get();
    
    $transactions = Transaction::where('tx_type', 'income')
			->orderBy('created_at', 'desc')
			->get();
	
        $data = [
            'totalOrderamt' => $total_amt,
            'todaysOrderamt' => $todayTotal,
            'myOrders' => $total_order,
           
        ];

    $alltransactions = Transaction::where('u_code',$userId)->latest()->take(6)->get(); 
	
    return view('user.pages.index', compact('popup','data','currency','usersWallets','userId','wallet','transactions','alltransactions','user'));
  }
		
   public function userProfile(){
    
	$user = Auth::user();
	
    return view('user.pages.profile',compact('user'));
  }


    public function update(Request $request)
    {
		
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'string|max:255',
           
        ]);
		
		// Upload image if provided
        $user_image='';
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$path = $file->store('user', 'public'); 
			$user_image= $path;
		}
        
		
        // Update the user
        $user->update([
		    'image' => $user_image,
            'name' => $request->first_name,
            'mobile' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
			
           
        ]);
         //echo"<pre>";
		// print_r($user->update);
		// die();
		 return redirect()->back()->with('success', 'Profile updated successfully.');
    }
	
	
	 public function updatePassword(Request $request)
    {
		
		
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
	
	
	public function transactions(Request $request)
    {
        
        $userId = auth()->id();
        $query = DB::table('transactions')
            ->join('users', 'transactions.u_code', '=', 'users.id')
            ->select(
                'transactions.*',
                'users.username',
                'users.name'
            )
            ->where('transactions.u_code', '=', $userId)  
            ->orderBy('transactions.created_at', 'desc');
        
       
		// Apply filters dynamically
		if ($request->has('username') && $request->username) {
			$query->where('users.username', 'LIKE', '%' . $request->username . '%');
		}
		if ($request->has('name') && $request->name) {
			$query->where('users.name', 'LIKE', '%' . $request->name . '%');
		}
		
		if ($request->has('from_date') && $request->from_date) {
			$query->whereDate('transactions.created_at', '>=', $request->from_date);
		}
		if ($request->has('to_date') && $request->to_date) {
			$query->whereDate('transactions.created_at', '<=', $request->to_date);
		}
	
		// Get filtered data with pagination
		$transactions = $query->paginate(10);

       
        return view('user.pages.transactions', compact('transactions'));
    }



    
	
	
	public function orders(Request $request)
	{
		$userId = auth()->id();
        $query = Order::query();
            // Filter by u_code
            $query->where('u_code',$userId);
        
            // Apply date filters if provided
            if ($request->has('from_date') && $request->has('to_date')) {
                $query->whereBetween('created_at', [
                    $request->input('from_date'),
                    $request->input('to_date')
                ]);
            }
        
         $orders = $query->orderBy('created_at', 'desc')->get();
        return view('user.pages.orders', compact('orders'));
	}

    
	
	public function invoice($id){
		$Conn = new DatabaseModel();
		$currency=$Conn->websiteInfo('currency');
        $order = Order::find($id);
        $orderDetails = json_decode($order->order_details, true);
		
		return view('user.pages.invoice',compact('order', 'orderDetails','currency'));
	}
    
	
  
}
