<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
	
	 // Add u_code to the fillable array
    protected $fillable = [
        'u_code',
        'payment_method',
        'amount',
		'txn_id',
		'payment_slip',
		'tx_type',
        'status',
        'wallet_type',
        
        // Add other columns that you want to allow mass assignment
    ];


    public function scopeDynamicPaginate($query, $perPage = 10, $filters = [])
    {
        // Apply filters dynamically
        foreach ($filters as $column => $value) {
            if (!empty($value)) {
                $query->where($column, 'like', "%{$value}%");
            }
        }

        // Return paginated results
        return $query->paginate($perPage);
    }
}
