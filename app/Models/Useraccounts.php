<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useraccounts extends Model
{
    use HasFactory;
    protected $table = 'useraccounts';

    protected $fillable = [
        'u_code',
        'default_account',
        'accounts',
        'img',
        'status'
        
    ];
}
