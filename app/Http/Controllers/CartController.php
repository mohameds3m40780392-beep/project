<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // إضافة منتج
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'color'      => 'required',
            'memory'     => 'required',
            'battery'    => 'required',
            'quantity'   => 'required|numeric|min:1',
        ]);

        DB::table('carts')->insert([
            'product_id' => $request->product_id,
            'color'      => $request->color,
            'memory'     => $request->memory,
            'battery'    => $request->battery,
            'quantity'   => $request->quantity,
            'created_at' => now(),
        ]);

        return redirect()->route('cart.index');
    }

    // عرض السلة + الحساب التلقائي
    public function index()
    {
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select(
                'carts.product_id', // ✅ لازم تضيف ده
                'products.name',
                'products.price',
                'products.img',
                'carts.quantity',
                'carts.color',
                'carts.memory',
                'carts.battery'
            )
            ->get();

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->price * $item->quantity;
        }

        return view('My-purchases', compact('cartItems', 'total'));
    }
    public function delete(Request $request)
    {
        DB::table('carts')
            ->where('product_id', $request->product_id)
            ->delete();

        return back();
    }
}
