<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class CartController extends Controller
{
    public function add($id)
    {
        $quantity = 1; 
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // --- IMAGE ARRAY FIX LOGIC ---
        // Agar image array hy to index 0 se pehli photo string nikalain, warna direct string use kren
        $productImage = $product->image;
        if (is_array($product->image) && count($product->image) > 0) {
            $productImage = $product->image[0];
        }

        // Agar product pehle se cart main hy to quantity barha dain
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $productImage // Ab yahan perfect unique string image hi save hogi
            ];
        }

        session()->put('cart', $cart);
        
        $totalCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => $totalCount
        ]);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('Cart', compact('cart'));
    }

    // --- NAYA UPDATE FUNCTION AJAX K LIYE YAHAN HY ---
    public function update(Request $request)
    {
        // Request check kren k ID aur Quantity aayi hy ya nahi
        if($request->id && $request->has('quantity')) {
            $cart = session()->get('cart', []);
            
            // Agar customer minus krte krte quantity 0 ya us se kam krde to item cart se nikal dain
            if($request->quantity <= 0) {
                unset($cart[$request->id]);
            } else {
                // Warna quantity update kr dain
                $cart[$request->id]["quantity"] = $request->quantity;
            }
            
            session()->put('cart', $cart);

            // Nayi calculations ta k total price live change ho sakay
            $total = 0;
            foreach($cart as $details) {
                $total += $details['price'] * $details['quantity'];
            }
            
            $totalCount = array_sum(array_column($cart, 'quantity'));
            
            // Is specific product ka apna naya total price
            $itemTotal = isset($cart[$request->id]) ? $cart[$request->id]['price'] * $cart[$request->id]['quantity'] : 0;

            // --- NAYA: Delivery charge logic ---
            $isFreeShipping = $total >= 5000;
            $shippingCharge = $isFreeShipping ? 0 : 300;
            $grandTotal = $total + $shippingCharge;

            return response()->json([
                'success' => true,
                'cart_count' => $totalCount,
                'item_total' => 'Rs. ' . number_format($itemTotal),
                'subtotal' => 'Rs. ' . number_format($total),
                'total' => 'Rs. ' . number_format($grandTotal),
                'shipping' => $isFreeShipping ? 'Free' : 'Rs. 300',
                'is_free_shipping' => $isFreeShipping,
                'removed' => !isset($cart[$request->id]) // Agar product remove ho gya ho to true jayga
            ]);
        }
    }
}