<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\DatabaseModel;
class MinWithdrawalLimit implements Rule
{
    protected $currency;
    protected $minLimit;

    /**
     * Create a new rule instance.
     */
    public function __construct()
    {

        $Conn = new DatabaseModel();
        $minLimit=$Conn->setting('min_withdrawal_limit');
        $currency=$Conn->websiteInfo('currency');

        // Fetch the minimum withdrawal limit and currency
        $this->minLimit = $minLimit;
        $this->currency = $currency;
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

      
        return is_numeric($value) && $value >= $this->minLimit;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The amount should be a minimum of {$this->currency} {$this->minLimit}.";
    }
}