<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use HasFactory;
    protected $table = 'pin_details';

    public function getPinDetails($pinType)
    {
        return self::where('pin_type', $pinType)->first();
    }

}
