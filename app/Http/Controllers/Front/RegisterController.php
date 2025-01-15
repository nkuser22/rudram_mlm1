<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserWallet;
use App\Models\Profile;
use App\Models\DatabaseModel;
use App\Rules\IsSponsorAvailable;

class RegisterController extends Controller
{
    
     // Show registration form
   public function showRegistrationForm()
   {
       $countries = DB::table('countries')->get();
       return view('front.pages.auth.register',compact('countries'));
   }

  // Handle user registration
   public function register(Request $request)
   {
   
    
      // Validate input
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|string|max:50|unique:users', // Username must be unique
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|digits:10', 
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required',
            'u_sponsor' => ['required', 'string', new IsSponsorAvailable],
        ]);
        $usponsor = $request->input('u_sponsor');
        
        $profile = new Profile();
        $sponserId = $profile->getIdByUsername($usponsor);
      
        // Create new user
        $user =User::create([
            'u_sponsor' => $sponserId,
            'name' => $request->name,
            'username' => $request->username, 
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country' => $request->country,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'password' => Hash::make($request->password),
          
        ]);
		
        $u_code=$user->id;
       if(!empty($u_code)){

		  UserWallet::insert([
                'u_code' => $u_code,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
        $updateWallet = new UserWallet();
        $updateWallet->addDirect($sponserId);  
        $updateWallet->addGen($sponserId); 
        $updateWallet->addGenUser($sponserId,$u_code); 
        $updateWallet->addUserTeam($u_code); 
    } 
         
    $Conn = new DatabaseModel();
    if ($Conn->setting('reg_type') == 'binary') {
    
        $updateWallet->updateBinary($sponserId);
    }

       
       // Save username and password in session
    $request->session()->put('username', $request->email);
    $request->session()->put('password', $request->password);

    // Redirect to success page
    return redirect('/register-success');
   }


   public function checkSponsorExist(Request $request)
    {
        $u_sponsor = $request->input('u_sponsor');
        $sponsorExists = User::where('username', $u_sponsor)->exists();

        if ($sponsorExists) {
            return response()->json([
                'error' => false,
                'msg' => 'Sponsor exists!',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'msg' => 'Sponsor not exist.',
            ]);
        }
    }


   public function getStates($country_id)
{
    $states = DB::table('states')->where('country_id', $country_id)->get();
    return response()->json($states);
}

public function getCities($state_id)
{
    $states = DB::table('cities')->where('state_id', $state_id)->get();
    return response()->json($states);
}

}
