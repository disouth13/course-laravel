<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{

    //
    public function index()
    {
        return "Hello World";
    }

    public function productshow()
    {
        return "Product Show";
        $this->FungsiLain();
        $data =  $this->FungsiLainReturn();
        echo $data;
    }

    public function ProductShowAll()
    {
        $products = Product::get();
        return view('product.showall', compact('products'));
    }

    public function FungsiLain()
    {
        echo "Testing";
    }

    public function FungsiLainReturn()
    {
        echo "Testing Return";
    }
}
