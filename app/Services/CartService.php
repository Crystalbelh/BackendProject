<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    const SESSION_KEY = 'cart'; // structure: [productId => qty]

    public function addToCart(int $productId, int $qty = 1): void
    {
        $qty = max(1, $qty);

        if (Auth::check()) {
            $row = Cart::firstOrNew([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);
            $row->quantity = ($row->exists ? $row->quantity : 0) + $qty;
            $row->save();
            return;
        }

        $cart = Session::get(self::SESSION_KEY, []);
        $cart[$productId] = ($cart[$productId] ?? 0) + $qty;
        Session::put(self::SESSION_KEY, $cart);
    }

    public function mergeSessionToDatabase(User $user): void
    {
        $cart = Session::get(self::SESSION_KEY, []);
        if (empty($cart)) return;

        foreach ($cart as $productId => $qty) {
            $row = Cart::firstOrNew([
                'user_id' => $user->id,
                'product_id' => (int)$productId,
            ]);
            $row->quantity = ($row->exists ? $row->quantity : 0) + (int)$qty;
            $row->save();
        }
        Session::forget(self::SESSION_KEY);
    }

    public function sessionCart(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }
}
