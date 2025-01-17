<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\ShowPage;
use App\Models\DatabaseModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     public function index(Request $request)
    {
      
    // agar admin alredy login h to redirect kr diya jaye dashboard page pe
    if($request->session()->has('admin_login')){

        return  redirect('admin/dashboard');
      
     }else{
        return view('admin_view/login');
      
     }
        return view('admin_view/login');
    }
	
	 public function auth(Request $req)
{
		
		$email = $req->post('email');
		$password = $req->post('password');

		// Find the admin record by email
		$admin = Admin::where('email', $email)->first();
        
		// Check if admin exists
		if ($admin) {
			// Verify password
			if (md5($password) === $admin->password) {
				// Store login details in session
				$req->session()->put('admin_login', true);
				$req->session()->put('admin_id', $admin->id);

				return redirect('admin/dashboard');
			} else {
				// Flash incorrect password error
				$req->session()->flash('error', 'Invalid password. Please try again.');
				return redirect('admin');
			}
		} else {
			// Flash invalid login details error
			$req->session()->flash('error', 'Invalid email or login details.');
			return redirect('admin/login');
		}
	}
	
	  public function dashboard(){
		  
		 
		
	  if (!session()->has('admin_login')) {
			return redirect('/admin/login')->with('error', 'Please login first.');
	   }

         $result['totalRevenue']= Order::sum('order_amount');
		 $result['totalusers'] = User::count();
		 $result['activeUser'] =User::where('active_status', 1)->count();
		 $result['inactiveUser'] = User::where('active_status', 0)->count();
		 $result['categories']= Category::all();
		 
		 $result['revenues'] = \DB::table('orders')
			->selectRaw('DATE(created_at) as date, SUM(order_amount) as total_revenue')
			->groupBy(\DB::raw('DATE(created_at)'))
			->orderBy('date', 'desc')
			->get();
			
		 
          // Retrieve the most recent order items with their associated product data
          $result['recentOrders'] = \App\Models\OrderItem::with('product') 
                    ->latest() 
                    ->limit(5) 
                    ->get();
					
		
        $result['recentCustomers'] = User::orderBy('created_at', 'desc')->take(4)->get();
		$result['transactions'] = Transaction::latest()->take(5)->get();
		
         return view('admin_view/index',$result);
      }
	  
	  
	  // Display the list of users
public function users(Request $request)
{

 
    // Start with all users
    $users = User::getUsersWithLocation();

    // Apply filters if available in the request
    if ($request->username && $request->username!='') {
        $users = $users->where('username', $request->username);
       
    }

    if ($request->name && $request->name!='') {
        $users = $users->where('name',$request->name);
       
    }

    if ($request->phone && $request->phone!='') {
        $users = $users->where('mobile',$request->phone);
    }

    if ($request->email && $request->email) {
        $users = $users->where('email',$request->email);
       
    }

    if ($request->filled('from_date') && $request->filled('to_date')) {
        $users = $users->whereBetween('created_at', [
            $request->from_date,
            $request->to_date,
        ]);
    }
   

   
    // Paginate the results
   // $users = $users->paginate(10);

    // Return the view with users
    return view('admin_view.users.users_list', compact('users'));
}

	
	 // Show the edit user profile form
    public function editUserProfile($id)
    {
        $user = User::findOrFail($id); // Find user by ID or return 404
        return view('admin_view.users.edit_user_profile', compact('user')); // Pass user data to the view
    }

    // Update the user profile
    public function updateUserProfile(Request $request, $id)
    {
        $user = User::findOrFail($id); // Find user by ID

        // Validation
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Ignore current user's email
        ]);

        // Update user data
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
			'mobile' => $request->mobile,
			'username' => $request->username,
        ]);

        $request->session()->flash('success','User profile updated successfully.');
        return redirect('/admin/users'); 
    }
	
	
	 // Show change password form
    public function showChangePasswordForm()
    {
       
        return view('admin_view.users.change-password');
    }
	
	
 public function loginAsUser($id)
    {
        $user = User::findOrFail($id);

        // Store admin's ID in the session to return later
        session(['admin_login' => Auth::id()]);

        // Log in as the selected user
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Logged in as user: ' . $user->name);
    }

public function changePassword(Request $request)
{
    // Validate the input
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);
    
    $currentPasswordMD5 = md5($request->current_password);
	$admin = DB::table('admins')->where('id', 1)->first();

    if ($currentPasswordMD5 !== $admin->password) {
        return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update the password using MD5
    DB::table('admins')->where('id', 1)->update([
        'password' => md5($request->new_password),
    ]);

	$request->session()->flash('success','Password updated successfully.');
    return redirect('/admin/change-password'); 
}


    public function contactHistory()
    {
        
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);

        return view('admin_view.contact', compact('contacts'));
    }


public function updateBlockStatus(Request $request)
{

   
    try {
        $user = User::findOrFail($request->id); 
        $user->block_status = $request->block_status; 
        $user->save(); 

        return response()->json(['success' => true, 'message' => 'Block status updated successfully.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error updating block status.']);
    }
}





}
