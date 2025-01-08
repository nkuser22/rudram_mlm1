<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
    use HasFactory;
	
	
	
	 public static function generateInvoiceNo()
    {
        // Fetch the last invoice number
        $lastOrder = self::orderBy('id', 'desc')->first();

        // Generate the next invoice number
        $nextInvoiceNo = $lastOrder 
            ? 'INV-' . str_pad((int) substr($lastOrder->invoice_no, 4) + 1, 6, '0', STR_PAD_LEFT)
            : 'INV-000001';

        return $nextInvoiceNo;
    }


    public function package($id)
    {
        $bvQuery = DB::table('orders')
            ->where('u_code', $id)
            ->where('status', '1')
            ->sum('order_bv');

        return $bvQuery ?: 0;
    }


    public function businessVolume($ids)
    {
        $users = is_array($ids) ? $ids : [$ids];

        $bvQuery = DB::table('orders')
            ->whereIn('u_code', $users)
            ->where('status', '1')
            ->sum('order_bv');

        return $bvQuery ?: 0;
    }




}
