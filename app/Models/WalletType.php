<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletType extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'u_code', 'e1', 'e2'
    ];
}
