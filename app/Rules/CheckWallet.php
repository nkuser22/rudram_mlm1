<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\UserWallet; // Assuming you have a User model for wallet balance

class CheckWallet implements Rule
{
    public function __construct()
    {
        // You can initialize anything if required
    }

    public function passes($attribute, $value)
    {
		
        $wallet = new UserWallet();
	    $userWalletBalance=$wallet->getWallet($user->id,'shopping_wallet');
		print_r($userWalletBalance);
		die();
        $totalAmount = request()->input('total_amount'); 

        return $userWalletBalance >= $totalAmount;
    }

    public function message()
    {
        return 'Insufficient wallet balance to complete the purchase.';
    }
}
