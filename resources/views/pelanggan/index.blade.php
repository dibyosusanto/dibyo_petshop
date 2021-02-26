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
        <h1>Selamat Datang, {{ $pelanggan->name }}</h1>
        <hr>
    </div>
@endsection