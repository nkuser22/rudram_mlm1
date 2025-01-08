<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class CartController extends Controller
{
   
    public function index()
    {
        $cart = session()->get('cart', []);
		
        return view('front.pages.cart', compact('cart'));
    }
	
	 // Add product to cart
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['product_qty']++;
        } else {
			
            $cart[$request->product_id] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
				'sale_price' => $product->sale_price,
                'product_qty' => 1,
				'product_img' => $product->product_img
				
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'cart' => $cart,
        ]);
    }
	
	 // Remove product from cart
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
            return response()->json([
                'message' => 'Product removed from cart.',
                'cart' => $cart,
            ]);
        }

        return response()->json(['message' => 'Product not found in cart.'], 404);
    }
	
		public function updateQuantity(Request $request)
	{
		$cart = session()->get('cart', []);

		if (isset($cart[$request->product_id])) {
			// Update quantity based on type (plus or minus)
			if ($request->type === 'plus') {
				$cart[$request->product_id]['product_qty']++;
			} elseif ($request->type === 'minus' && $cart[$request->product_id]['product_qty'] > 1) {
				$cart[$request->product_id]['product_qty']--;
			}

			session()->put('cart', $cart);

			return response()->json([
				'status' => 'success',
				'product_qty' => $cart[$request->product_id]['product_qty'],
			]);
		}

		return response()->json(['status' => 'error', 'message' => 'Product not found in cart.'], 404);
	}

	public function destroyCart()
	{
		// Clear the session cart data
		session()->forget('cart');

		return response()->json(['status' => 'success', 'message' => 'Cart has been cleared.']);
	}


}
