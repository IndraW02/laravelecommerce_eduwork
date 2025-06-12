<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;
        $cart[$id] = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => ($cart[$id]['quantity'] ?? 0) + 1
        ];

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
     {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Jumlah produk diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

        public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan.');
    }
}
