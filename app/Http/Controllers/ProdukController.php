<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{

    //
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'products.categories_id', '=', 'categories_id')
        ->get();
        // echo "<pre>";
        // print_r($products);

        // dd($products);
        return view('product.showall', compact('products'));
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

    public function store()
    {
        DB::table('products')->insert([
            'nama'  => 'LeMineral',
            'categories_id' => '1',
            'qty' => 1,
            'harga_beli' => 23000,
            'harga_jual' => 30000,

        ]);

        echo "Data Berhasil Disimpan !";
    }


    public function update()
    {
        DB::table('products')
        ->where('id', 3)
        ->update([
            'nama'  => 'Le Mineral',
            'categories_id' => '1',
            'qty' => 1,
            'harga_beli' => 23000,
            'harga_jual' => 330000,

        ]);

        echo "Data Berhasil Diupdate !";
    }


    public function delete()
    {
        DB::table('products')
        ->where('id', 3)
        ->delete();

        echo "Data Berhasil Di Delete !";
    }
}
