<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\DatabaseModel;
class WalletUseable implements Rule
{
    public function passes($attribute, $value)
    {
       
        $Conn = new DatabaseModel();
        $available_wallets=$Conn->setting('invest_wallets');
        $usable_wallet = json_decode($available_wallets, true);

        // Check if the provided wallet is usable
        return array_key_exists($value, $usable_wallet);
    }

    public function message()
    {
        return 'You cannot top up from this wallet.';
    }
}
