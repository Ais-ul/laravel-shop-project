<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $cart->load('items.product');

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, string $productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->stock <= 0) {
            return back()
                ->withErrors([
                    'stock' => 'Produsul este stoc epuizat.',
                ]);
        }

        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + 1,
            ]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function update(Request $request, string $id)
    {
        $cartItem = CartItem::findOrFail($id);

        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $quantity = max(1, (int) $request->quantity);

        $cartItem->update([
            'quantity' => $quantity,
        ]);

        return redirect()->route('cart.index');
    }

    public function destroy(string $id)
    {
        $cartItem = CartItem::findOrFail($id);

        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        return redirect()->route('cart.index');
    }

    public function clear()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            $cart->items()->delete();
        }

        return redirect()->route('cart.index');
    }
}
