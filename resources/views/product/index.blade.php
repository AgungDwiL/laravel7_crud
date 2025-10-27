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

        @foreach ($products as $product)
        <tr>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->details}}</td>
            <td><img src="{{ asset('images/'.$product->logo)}}" class="img-thumbnail" style="width: 100px; height: auto;"></td>
            <td>
                <a class="btn btn-info" href="{{ route('product.show')}}">Show</a>
                <a class="btn btn-primary" href="{{ URL::to('edit/product/'. $product->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{ route('product.delete')}}">Delete</a>
            </td>
        </tr
            
        @endforeach
        >
    </table>
@endsection

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif