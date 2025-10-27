<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Products as Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
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

    public function edit($id)
    {
        $product = Product::findorFail($id);
        return view('product.edit', compact('product'));
    }

    public function delete($id)
    {
        $data = Product::findorFail($id);
        $image = public_path('images').'/'.$data->logo;
        $image = str_replace('\\', '/', $image);
        unlink($image);
        $products = Product::find($id)->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        // ✅ Validasi input
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:255',
            'details' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // tidak wajib
        ]);

        // ✅ Ambil data lama
        $product = Product::findOrFail($id);

        // ✅ Kalau ada file logo baru, hapus yang lama dan upload yang baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama (kalau ada)
            if ($product->logo && file_exists(public_path('images/'.$product->logo))) {
                unlink(public_path('images/'.$product->logo));
            }

            // Upload logo baru
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);

            $product->logo = $imageName;
        }

        // ✅ Update field lain
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->details = $request->details;

        // ✅ Simpan semua perubahan
        $product->save();

        // ✅ Redirect sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product', 'id'));
    }
}
