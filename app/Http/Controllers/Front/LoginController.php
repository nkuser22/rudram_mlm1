<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Show login form
   public function showLoginForm()
   {
       return view('front.pages.auth.login');
   }

    
    // Handle login attempt
    public function login(Request $request)
    {
        // Validate login credentials
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Fetch the authenticated user
            $user = Auth::user();

            // Check if the user is blocked
            if ($user->block_status == 1) {
                // If blocked, logout the user and show an error message
                Auth::logout();
                $request->session()->flash('error', 'Your account is blocked. Please contact the admin.');
                return redirect('/login');
            }

            // Set custom session data on successful login
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);

            // Redirect to dashboard or intended page
            $request->session()->flash('message', 'You are logged in!');
            return redirect('/dashboard');
        } else {
            // If login fails, redirect back to login with an error
            $request->session()->flash('error', 'Invalid login credentials.');
            return redirect('/login');
        }
    }


      // Logout logic (optional)
     public function logout()
     {
         Auth::logout();
         Session::flush(); // Clear all session data
         return redirect()->route('login')->with('success', 'You have been logged out.');
     } 
}
