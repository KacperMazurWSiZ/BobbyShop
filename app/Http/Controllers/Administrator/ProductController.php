<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{

    public function index()
    {

        $products = Product::with(['category'])->get();
        return view('administrator.product.index', [
            "products" => $products
        ]);
    }
}
