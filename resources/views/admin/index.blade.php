@extends('admin.master')
@section('title')
    PetsQuShop - Admin
@endsection
@section('content')
    <div class="container mt-5 pt-5">
        <h3 class="text-center">Selamat Datang, {{ Auth::user()->name }}</h3>
    </div>
@endsection