<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Products::query();

        // فحص لو فيه فلتر سعر مبعوت
        if ($request->has('price_range')) {
            // بنقسم القيمة زي 0-500 لقطعتين
            $range = explode('-', $request->price_range);

            if (count($range) == 2) {
                $query->whereBetween('price', [$range[0], $range[1]]);
            } elseif ($request->price_range == '2000+') {
                // حالة خاصة للأسعار اللي فوق 2000
                $query->where('price', '>', 2000);
            }
        }

        $products = $query->get();
        return view('home', compact('products'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|image',
        ]);

        if ($request->hasFile('img')) {
            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('uploads/products'), $fileName);
            $path = 'uploads/products/' . $fileName;
        }

        Products::create([
            'name'  => $request->name,
            'img'   => $path ?? '',
            'price' => $request->price,
        ]);

        return redirect()->back();
    }
}
