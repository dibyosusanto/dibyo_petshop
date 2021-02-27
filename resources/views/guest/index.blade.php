@extends('layouts.master')

@section('title')
    PetsQuShop
@endsection

@section('content')
    <div class="container mt-5 pt-3">
        <div class="jumbotron mt-5 pt-5">
            <h1 class="display-4 font-weight-bold text-center">Selamat Datang di PetsQuShop</h1>
            <hr class="my-4">
            <p>
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('img/kucingmakan.png') }}" alt="" class="mx-auto d-block">    
                    </div>
                    <div class="col justify-content-center">
                        <h2 class="font-weight-light text-center pb-0 pt-5 pr-5 pt-5"> PetsQu Shop menyediakan berbagai macam kebutuhan hewan peliharaan. <br/> Penuhi kebutuhan hewan peliharaanmu di sini</h2>
                        <p class="text-center">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-xl">Daftar</a>
                        </p>
                    </div>
                </div>
            </p>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center">Produk Terbaru</h3>
        <hr/>
    </div>
    <div class="card-deck">
        @foreach($products as $product)
        <div class="card">
            <img class="card-img-top" src="{{ asset('storage/products/' . $product->picture) }}" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text">{{ substr($product->description, 0, 10) }}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        @endforeach
    </div>
@endsection