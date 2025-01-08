<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'u_code',
		'ticket',
        'subject',
        'description',
        'status',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

