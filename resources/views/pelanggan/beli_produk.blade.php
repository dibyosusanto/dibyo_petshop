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
                <form action="{{ route('pelanggan.save_order', $product->id) }}" method="POST" id="beli_produk" name="beli_produk">
                @method('post')
                @csrf
                <div class="row">
                    <div class="form-group col-4">
                        <label for="product_id">Kode Produk</label>
                        <input type="text" name="product_id" value="{{ $product->id }}" readonly>
                    </div>
                    <div class="form-group col-4">
                        <label for="product_name" class="font-weight-bold">Nama Produk</label>
                        <p>{{ $product->product_name }}</p>
                    </div>
                    <div class="form-group col-4">
                        <label for="product_name" class="font-weight-bold">Harga Satuan Produk</label>
                        <input type="text" name="price" id="price" readonly value="{{ $product->price }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="product_name" class="font-weight-bold">Qty</label>
                        <input type="text" name="qty" id="qty" class="form-control" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
                    </div>
                    <div class="form-group col-4">
                        <label for="product_name" class="font-weight-bold">Total Harga</label>
                        <input type="text" name="total" id="total" class="form-control" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-center"><button class="btn btn-primary btn-block" type="submit">Beli</button></p>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function startCalculate(){
            interval = setInterval("Calculate()", 10);	
        }
        
        function Calculate(){
            var harga=parseInt(document.beli_produk.price.value);
            var quantity = parseInt(document.beli_produk.qty.value);
            
            document.beli_produk.total.value = parseInt(quantity*harga);
        }
        
        function stopCalculate(){
            interval = clearInterval();	
        }
    </script>
@endsection