<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = null;

        if (auth()->check()) {
            $user = auth()->user();
            $cart = $user->cart()->firstOrCreate(['user_id' => $user->id]);
        } else {
            $sessionId = session()->getId();
            $cart = Cart::firstOrCreate(['session_id' => $sessionId]);
        }

        if ($request->type === 'test') {
            $cartItem = $cart->items()->where('test_id', $request->product_id)->first();
        } else {
            $cartItem = $cart->items()->where('package_id', $request->product_id)->first();
        }

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'test_id' => $request->type === 'test' ? $request->product_id : null,
                'package_id' => $request->type === 'package' ? $request->product_id : null,
                'type' => $request->type ? 'any' : null,
                'quantity' => $request->quantity,
            ]);
        }

        return back()->with('success', 'Item added to cart!');
    }


    public function removeFromCart(Request $request)
    {
        $cart = null;

        if (auth()->check()) {
            $user = auth()->user();
            $cart = $user->cart;
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
        }
        if ($request->type === 'test') {
            $cartItem = $cart->items()->where('test_id', $request->product_id)->first();

        } elseif ($request->type === 'package') {

            $cartItem = $cart->items()->where('package_id', $request->product_id)->first();
        }

        if ($cartItem) {
            $cartItem->delete();
        }

        return back()->with('success', 'Item removed from cart!');
    }

    public function viewCart()
    {
        $cart = null;

        if (auth()->check()) {
            $cart = auth()->user()->cart;
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
        }

        return view('cart.index', compact('cart'));
    }
    public function getCartItems()
    {
        if (auth()->check()) {
            $cart = auth()->user()->cart;
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
        }

        $cartItems = $cart->items; // Adjust according to your cart structure
        return response()->json($cartItems);
    }
}
