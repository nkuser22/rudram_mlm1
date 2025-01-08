<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function getByUserAndProductId($user_id, $product_id)
    {
        return $products = DB::table('products')
        ->where('id', $product_id)
        ->get();
    }
}
