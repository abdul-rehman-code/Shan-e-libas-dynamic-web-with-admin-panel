<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
        $settings = Setting::all();

        return view('checkout', compact('cart', 'settings'));
    }

public function placeOrder(Request $request)
    {
        // 1. Validation
       $validator = \Validator::make($request->all(), [
            'name'               => 'required|string|max:255',
            'phone'              => 'required|string|max:20',
            'address'            => 'required|string',
            'payment_method'     => 'required|string|in:cod,jazzcash',
            'payment_screenshot' => 'required_if:payment_method,jazzcash|nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'payment_screenshot.required_if' => 'Online payment ke liye payment screenshot upload karna lazmi hai!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }

        // 2. Cart Check
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Cart empty hai!'
            ], 400);
        }

        // 3. Totals
        $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $shipping = $subtotal >= 5000 ? 0 : 300;
        $total = $subtotal + $shipping;

        // 4. File Upload
        $screenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            $screenshotPath = $request->file('payment_screenshot')->store('screenshots', 'public');
        }

        // 5. Create Order
        $order = Order::create([
            'customer_name'      => $request->name,
            'customer_email'     => $request->email,
            'customer_phone'     => $request->phone,
            'shipping_address'   => $request->address,
            'subtotal'           => $subtotal,
            'shipping'           => $shipping,
            'total_amount'       => $total,
            'status'             => 'pending',
            'payment_method'     => $request->payment_method,
            'payment_status'     => $request->payment_method === 'cod' ? 'unpaid' : 'pending',
            'payment_screenshot' => $screenshotPath,
        ]);

        // 6. Create Order Items
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $id,
                'quantity'   => $details['quantity'],
                'price'      => $details['price'],
            ]);
        }

        // 7. Clear Cart Session
        session()->forget('cart');

        // 8. Success JSON response with Order ID
        return response()->json([
            'status'       => 'success',
            'order_id'     => $order->id,
            'message'      => 'Your Order #' . $order->id . ' has been placed successfully!',
            'redirect_url' => route('home')
        ]);
    }

}