@extends('admin.master')
@section('title')
    Detail Order
@endsection
@section('content')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="form-group col-4">
                <label for="created_at" class="font-weight-bold">Tanggal Order</label>
                <p>{{ date('d F Y', strtotime($order->created_at)) }}</p>
            </div>
            <div class="form-group col-4">
                <label for="name" class="font-weight-bold">Nama Pelanggan</label>
                <p>{{ $order->user->name }}</p>
            </div>
            <div class="form-group col-4">
                <label for="name" class="font-weight-bold">Status Pesanan</label>
                @if($order->status == 0)
                    <p class="badge badge-warning">Sedang diproses</p>
                @else
                    <p class="badge badge-success">Selesai</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="product_name" class="font-weight-bold">Nama Produk</label>
                <p>{{ $order->product->product_name }}</p>
            </div>
            <div class="form-group col-4">
                <label for="price" class="font-weight-bold">Harga Satuan Produk</label>
                <p>Rp. {{ number_format($order->product->price, 0, '.', '.') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="qty" class="font-weight-bold">Qty</label>
                <p>{{ $order->qty }}</p>
            </div>
            <div class="form-group col-4">
                <label for="total" class="font-weight-bold">Total Harga</label>
                <p>Rp. {{ number_format($order->qty * $order->product->price, 0, '.', '.') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="address" class="font-weight-bold">Alamat</label>
                <p>{{ $order->user->address }}</p>
            </div>
            <div class="form-group col-4">
                <label for="no_hp" class="font-weight-bold">No. HP</label>
                <p>{{ $order->user->no_hp }}</p>
            </div>
        </div>
        </form>
    </div>
    
@endsection