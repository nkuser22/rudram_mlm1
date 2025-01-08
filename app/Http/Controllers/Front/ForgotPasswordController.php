<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\DatabaseModel;
use Illuminate\Support\Facades\Hash;
class ForgotPasswordController extends Controller
{
	
	public function index(){
		
		return view('front.pages.auth.forgot');
	}
	
	
    public function verify(Request $request)
    {
        // Check if the request has the 'username' field
        $request->validate([
            'username' => 'required'
        ]);

        $tx_username = $request->input('username');

        // Check if the username exists in the database
        $user = DB::table('users')
            ->select('email', 'mobile', 'id')
            ->where('username', $tx_username)
            ->first();
       
        if ($user) {
            // Generate OTP
            $otp = mt_rand(100000, 999999);

            // Store OTP and User ID in session
            Session::put('forgot_otp', $otp);
            Session::put('forgot_user', $user->id);

            $Conn = new DatabaseModel();
            $company_name = $Conn->websiteInfo('company_name');
            $company_url = $Conn->websiteInfo('company_url');

            // Prepare and send the WhatsApp message
            $sms = "$otp is your OTP for forgot password. Thanks $company_name team.";
            $this->sendWhatsAppMessage($user->mobile, $sms);

            // Flash success message and redirect to the verification page
            Session::flash('success','Your OTP is '. $otp);
            return Redirect::to(url('/verify-otp'));
        } else {
            // Flash error message if username doesn't exist
            Session::flash('error', 'Username does not exist. Please enter a valid username.');
            return Redirect::back();
        }
    }

    private function sendWhatsAppMessage($mobile, $message)
    {
        // You can integrate a WhatsApp API or SMS service here
        // Example:
        // $this->messageService->sendWhatsAppMessage($mobile, $message);
    }
	
	
	
	public function verifyOtp(Request $request)
    {
		
		
        // Check if 'forgot_user' session exists
        if (!Session::has('forgot_user')) {
            Session::flash('error', 'Please enter the username.');
            return redirect()->route('forgot-password'); // Redirect to the forgot password page
        }

        // Handle OTP Verification
        if ($request->isMethod('post')) {
            $request->validate([
                'forgot_otp' => 'required|numeric',
            ]);

            $forgotOtp = $request->input('forgot_otp');

            if ($forgotOtp && Session::get('forgot_otp') == $forgotOtp) {
                Session::put('forgot_otp_verified', true);
                Session::flash('success', 'OTP Verified Successfully.');
                return redirect()->route('change-password'); // Redirect to the change password page
            } else {
                Session::flash('error', 'Incorrect OTP. Please enter a valid OTP.');
                return redirect()->back();
            }
        }

        return view('front.pages.auth.verify'); 
    }
	
	
	    public function changePassword(Request $request)
    {
        
        if (!Session::has('forgot_otp_verified') || !Session::get('forgot_otp_verified')) {
            Session::flash('error', 'Please verify OTP first.');
            return redirect()->route('verify-otp');
        }

        
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required|min:6|confirmed', 
            ]);

           
            $userId = Session::get('forgot_user');
            
           
            $user = \App\Models\User::find($userId);
            if ($user) {
                $user->password = Hash::make($request->input('password'));
                $user->save();

                // Clear session variables
                Session::forget(['forgot_otp', 'forgot_otp_verified', 'forgot_user']);

                Session::flash('success', 'Password changed successfully.');
                return redirect()->route('login'); // Redirect to login page
            } else {
                Session::flash('error', 'User not found.');
                return redirect()->back();
            }
        }

        return view('front.pages.auth.change_password'); 
    }
}
