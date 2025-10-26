@extends('product.layout')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Tambahkan Produk Baru</h2>
        <a class="btn btn-success" href="{{ route('product.index') }}">Kembali</a>
    </div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="row">

            <div class="col-6 col-sm-6 col-md-6">
                <div class=mb-3>
                    <strong>Nama Produk</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Nama Produk">
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-6">
                <div class=mb-3>
                    <strong>Kode Produk</strong>
                    <input type="text" name="product_code" class="form-control" placeholder="Kode Produk">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12">
                <div class=mb-3>
                    <strong>Detail</strong>
                    <input type="text" name="details" class="form-control" placeholder="Detail Produk">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12">
                <div class=mb-3>
                    <strong>Gambar Produk</strong>
                    <input type="file" name="logo">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </form>
    
</div>
@endsection