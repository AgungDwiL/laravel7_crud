<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Laravel 7 CRUD</title>
</head>
<body>
    <div class="container-fluid">
        <bs5-row>
            <h1>Tambahkan Produk Kamu</h1>
            <a class="btn btn-success" href="{{route('product.create')}}">Tambahkan Produk Kamu</a>
        </bs5-row>
        <br>
        <br>
        <bs5-row>
            <h1>Lihat Produk</h1>
            <a class="btn btn-primary" href="{{route('product.index')}}">Lihat Produk</a>
        </bs5-row>

    </div>
    
</body>
</html>