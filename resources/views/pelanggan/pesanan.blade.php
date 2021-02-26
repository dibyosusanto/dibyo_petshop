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
        @foreach($orders as $order)
        <div class="card">
            <div class="card-header">
                {{ 'Pesanan ' . date('d F Y', strtotime($order->created_at)) }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-3">
                        <label for="product_name" class="font-weight-bold">Nama Produk</label>
                        <p>{{ $order->product->product_name }}</p>
                    </div>
                    <div class="form-group col-3">
                        <label for="price" class="font-weight-bold">Harga Satuan Produk</label>
                        <p>{{ 'Rp. ' . number_format($order->product->price, 0, '.', '.') }}</p>
                    </div>
                    <div class="form-group col-3">
                        <label class="font-weight-bold" for="status">Status</label>
                        @if($order->status == 0)
                            <br><p class="badge badge-warning">Sedang diproses</p>
                        @else
                            Selesai
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="price" class="font-weight-bold">Quantity</label>
                        <p>{{ $order->qty }}</p>
                    </div>
                    <div class="form-group col-3">
                        <label for="price" class="font-weight-bold">Total Harga</label>
                        <p>{{ 'Rp. ' . number_format($order->qty * $order->product->price, 0, '.', '.') }}</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
@endsection