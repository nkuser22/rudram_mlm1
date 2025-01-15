<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class ValidPackage implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the package exists and is active
        $check_username = DB::table('pin_details')
                            ->where('pin_type', $value)
                            ->exists();

        return $check_username;
    }

    public function message()
    {
        return 'Invalid Package! Please select a valid package.';
    }
}
