@extends('pelanggan.master')
@section('title')
    Produk
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
        <div class="row row-cols-1 row-cols-md-3">
            @foreach($products as $product)
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/products/'.$product->picture) }}" class="card-img-top" height="200px">
                    <div class="card-body">
                    
                        <h5 class="card-title"> {{ $product->product_name }}</h5>
                        <hr/>
                        <p class="font-weight-bold">{{ 'Rp. ' . number_format($product->price, 0, '.', '.') }}</p>
                        <p class="card-text">{{ substr($product->description, 0, 20) . '...' }}</p>
                        <p class="text-right"><a class="btn btn-outline-primary" href="{{ route('pelanggan.detail_produk', $product->id) }}">Detail</a></p>
                    </div>
                </div>
                
            </div> 
            @endforeach   
        </div>
    </div>
@endsection