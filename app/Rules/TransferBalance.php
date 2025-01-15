<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\UserWallet;
class TransferBalance implements Rule
{
    protected $userId;
    protected $walletType;

    /**
     * Create a new rule instance.
     *
     * @param int $userId
     * @param string $walletType
     */
    public function __construct($userId, $walletType)
    {
        $this->userId = $userId;
        $this->walletType = $walletType;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       
        $wallet = new UserWallet();
	    $balance=$wallet->getWallet($this->userId,$this->walletType);
        return $balance >= $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Insufficient funds in the selected wallet.';
    }
}
