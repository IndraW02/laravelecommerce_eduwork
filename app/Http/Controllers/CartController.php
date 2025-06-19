<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Menampilkan daftar isi keranjang milik user yang login.
     */
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::with('product')
                    ->where('user_id', $user->id)
                    ->get();

        return view('carts.index', compact('cart')); // Perbaikan view path
    }

    /**
     * Menambahkan produk ke dalam keranjang.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $productId = $request->id;
        $product = Product::findOrFail($productId); // validasi produk

        // Cek jika produk sudah ada di keranjang
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    /**
     * Mengupdate jumlah produk dalam keranjang.
     */
    public function update(Request $request, string $id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($cartItem->user_id === Auth::id()) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return redirect()->route('cart.index')->with('success', 'Jumlah produk diperbarui.');
    }

    /**
     * Menghapus produk dari keranjang.
     */
    public function destroy(string $id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($cartItem->user_id === Auth::id()) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    /**
     * Mengosongkan seluruh keranjang pengguna.
     */
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete(); // ganti dari session ke DB
        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan.');
    }
}
