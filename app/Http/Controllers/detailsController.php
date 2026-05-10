<?php

namespace App\Http\Controllers;

use App\Models\Products;

class detailsController extends Controller
{
    public function show($id)
    {
        // جلب بيانات المنتج بناءً على الـ ID
        $product = Products::findOrFail($id);

        // عرض صفحة التفاصيل مع تمرير بيانات المنتج
        return view('details_product', compact('product'));
    }
}