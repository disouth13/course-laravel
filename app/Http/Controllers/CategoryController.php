<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //index
    public function index()
    {
        // $category = Category::latest()->get();
        // echo "<pre>";

        $category = Category::all();
        // echo "<pre>";
        // print_r($category);

        foreach ($category as $item) {
            # code...
            echo $item->nama_kategori;
            // echo "<br>";

            // echo $item->product->nama;
            foreach ($item->product()->get() as $itemproduct) {
                # code...
                echo $itemproduct->nama;
            }

        }
        // return view('category.index',compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        //eloquent mass assigmnent biasa
        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('category-index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        //simpan database
        $category->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('category-index');
    }

    public function destroy(string $id)
    {
        //cari id posts
        $category = Category::findOrFail($id);


        //delete row data
        $category->delete();

        return redirect()->route('category-index');

    }
}
