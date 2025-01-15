<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companypaymethod extends Model
{
    use HasFactory;

    protected $table = 'companypaymethods';

    protected $fillable = [
        'method_name',
        'unique_name',
        'default_account',
        'fields_required',
        'image',
        'type',
        'status',
    ];
}
