@extends('product.layout')

@section('content')
<div class="container">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h1 class="sm-3">Informasi Produk</h1>
        <a class="btn btn-success" href="{{ route('product.index') }}">Kembali</a>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Kolom kiri: Informasi produk -->
            <div class="col-md-8">
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Nama Produk:</div>
                    <div class="col-sm-9">{{ $product->product_name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Kode Produk:</div>
                    <div class="col-sm-9">{{ $product->product_code }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Detail:</div>
                    <div class="col-sm-9">{{ $product->details }}</div>
                </div>
            </div>

            <!-- Kolom kanan: Gambar produk -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/'.$product->logo) }}" 
                    alt="Gambar Produk" 
                    class="img-fluid rounded" 
                    style="max-height:200px;">
            </div>
        </div>
    </div>
</div>

@endsection