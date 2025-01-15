<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class AlreadyTopup implements Rule
{
    /**
     * The username being validated.
     *
     * @var string
     */
    protected $username;

    /**
     * Create a new rule instance.
     *
     * @param string $username
     * @return void
     */
    public function __construct($username)
    {
        $this->username = $username;
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
        // Ensure the username is not empty
        if (empty($value)) {
            return false;
        }

        // Check if the user has an active package
        $user = DB::table('users')
                    ->where('username', $value)
                    ->where('active_status', 1)
                    ->first();

        return !$user; // return false if user already has an active package
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The user you are trying to top up already has an active package.';
    }
}
