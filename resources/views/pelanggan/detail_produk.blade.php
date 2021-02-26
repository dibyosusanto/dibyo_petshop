@extends('pelanggan.master')
@section('title')
    PetsQuShop - Pelanggan
@endsection
@section('content')
    <div class="container mt-5 pt-5">
    @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('error') }}
            </div>
        @endif
        <div class="card w-100">
            <div class="card-body">
                <p class="text-center"><img src="{{ asset('storage/products/' . $product->picture) }}" height="50%" weight="50%"></p>
                <p class="font-weight-bold">{{ 'Rp. ' . number_format($product->price, 0, '.', '.') }}</p>
                <p class="font-weight-bold">{{ $product->product_name }}</p>
                <hr>
                <p class="font-weight-bold">Deskripsi Produk</p>
                <p>{{ $product->description }}</p>
            </div>
            <div class="card-footer">
                <p class="text-center"><a href="{{ route('pelanggan.beli_produk', $product->id) }}" class="btn btn-primary btn-block">Beli</a></p>
            </div>
        </div>
    </div>
@endsection