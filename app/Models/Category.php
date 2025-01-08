<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	
	// Add this function to fetch subcategories
    public static function getSubcategories($parentid=null)
    {
        return self::where('id', $parentid)->get();
    }
}
