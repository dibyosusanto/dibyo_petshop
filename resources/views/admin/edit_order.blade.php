@extends('admin.master')
@section('title')
    Edit Order
@endsection
@section('content')
    <div class="container mt-5 pt-5">
        <form action="{{ route('admin.update_order', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
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
                    <select name="status" id="status" class="form-control">
                        @if($order->status==0)
                            <option value="0" selected>Sedang diproses</option>
                            <option value="1">Selesai</option>
                        @else
                            <option value="0">Sedang diproses</option>
                            <option value="1" selected>Selesai</option>
                        @endif
                        
                    </select>
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
            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
        </form>
    </div>
    
@endsection