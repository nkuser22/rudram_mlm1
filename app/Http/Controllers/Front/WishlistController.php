<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
		public function toggle(Request $request)
	{
	   
		if (!Auth::check()) {
			return response()->json(['status' => 'unauthenticated', 'message' => 'Please log in to continue'], 401);
		}
		
		$userId = Auth::id(); 
		$productId = $request->input('product_id');
		
	   
		$wishlistItem = Wishlist::where('user_id', $userId)
								->where('product_id', $productId)
								->first();

		if ($wishlistItem) {
		   
			$wishlistItem->delete();
			return response()->json(['status' => 'removed', 'message' => 'Removed from wishlist']);
		} else {
			
			Wishlist::create([
				'user_id' => $userId,
				'product_id' => $productId,
			]);
			return response()->json(['status' => 'added', 'message' => 'Added to wishlist']);
		}
	}

	public function showWishlist()
	{
		
		$userId = Auth::id(); 
		$wishlistItems = Wishlist::with('product')
			->where('user_id', $userId)
			->get();
		
		return view('front.pages.wishlist.wishlist', compact('wishlistItems'));
	}
	


   

}
