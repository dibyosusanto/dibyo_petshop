@extends('admin.master')
@section('title')
    Edit Produk
@endsection
@section('content')
    <div class="container mt-5 pt-5">
        <form method="POST" action="{{ route('admin.update_product', $product->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h1>Edit Produk {{ $product->product_name }}</h1>
        <hr>
        <div class="form-group">
            <label for="product_name">Nama Produk</label>
            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
        </div>
        <div class="form-group mb-0">
            <label for="price">Harga</label>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="picture">Deskripsi</label>
            <p class="text-center"><img src="{{ asset('storage/products/' . $product->picture) }}" alt=""></p>
            <p class="font-weight-bold text-center"> Jika ingin mengubah gambar, silahkan upload file. Abaikan jika tidak ingin mengubah gambar </p>
            <input type="file" name="picture">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>
    
@endsection