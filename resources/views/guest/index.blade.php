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
                            <a href="#" class="btn btn-primary btn-xl">Mulai Belanja</a>
                        </p>
                    </div>
                </div>
            </p>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center">Produk Terlaris</h3>
        <hr/>
    </div>
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
@endsection