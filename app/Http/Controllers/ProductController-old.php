<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return "Hello World";
    }

    public function productshow()
    {
        return "Product Show";
    }

    public function ProductShowAll()
    {
        $products = Product::get();
        return view('product.showall', compact('products'));
    }
}
