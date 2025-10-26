@extends('product.layout')

@section('content')
<br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produk List</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Membuat Produk Baru</a>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Kode Produk</th>
            <th>Details</th>
            <th>Gambar Produk</th>
            <th>Action</th>
        </tr>

        <tr>
            <td>T-shirt</td>
            <td>1404S</td>
            <td>Lorem Ipsum Sederhana</td>
            <td></td>
            <td>
                <a class="btn btn-info" href="">Show</a>
                <a class="btn btn-primary">Edit</a>
                <a class="btn btn-danger">Delete</a>
            </td>
        </tr>
    </table>
@endsection