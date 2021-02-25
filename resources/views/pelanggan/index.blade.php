@extends('layouts.master')
@section('title')
    PetsQuShop - Pelanggan
@endsection
@section('content')
    <div class="container m-5 p-5">
    @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('error') }}
            </div>
        @endif
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos vitae nisi praesentium hic quo quas inventore atque ex. Laborum aspernatur rem placeat nam animi magni reprehenderit maxime consectetur alias? Repudiandae! Pelanggan
    </div>
@endsection