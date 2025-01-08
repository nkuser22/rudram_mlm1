<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;
	 protected $fillable = ['order_id', 'status', 'changed_at', 'remarks'];

    // Define the relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
	
	public function product()
    {
        return $this->belongsTo(Product::class); 
    }
}
