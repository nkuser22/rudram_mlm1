<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Pin;
use App\Models\UserWallet;


use App\Http\Controllers\UpdateController;

class WalletBalance implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if selected pin exists and retrieve its rate
        if (isset(request()->selected_pin) && request()->selected_pin != '') {
            $pin_details = Pin::where('pin_type', request()->selected_pin)->first();

            if ($pin_details) {
                $pin_rate = $pin_details->pin_rate;

                 $wallet = new UserWallet();
	             $user_wallet_balance=$wallet->getWallet(auth()->user()->id,$value);

                // Return true if wallet balance is sufficient
                return $user_wallet_balance >= $pin_rate;
            }
        }

        return false;
    }

    public function message()
    {
        // Return the appropriate error message
        if (!isset(request()->selected_pin) || request()->selected_pin == '') {
            return "Please select a valid pin.";
        }

        return "Insufficient funds in wallet.";
    }
}
