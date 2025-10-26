<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Products as Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // Validasi dulu input dari form
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'details' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file gambar (jika ada)
        $imageName = null;
        if ($request->hasFile('logo')) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
        }

        // Simpan ke database pakai Eloquent
        Product::create([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'details' => $request->details,
            'logo' => $imageName,
        ]);

        // Redirect balik ke halaman utama produk
        return redirect()->route('product.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }
}
