<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class IsSponsorAvailable implements Rule
{
    public function __construct()
    {
        // You can pass parameters to the rule if needed
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
        $sponsor = DB::table('users')
            ->where('username', $value)
            ->first();

        if ($sponsor) {
            return $sponsor->active_status == 1;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The sponsor is either not active or does not exist. Please try another.';
    }
}
