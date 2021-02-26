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
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('status') }}
        </div>
    @endif
        <div class="card w-100">
            <div class="card-body">
                <form action="{{ route('pelanggan.update_profile', Auth::user()->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="row">
                    <div class="form-group col-4">
                        <label for="name" class="font-weight-bold">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $profile->name }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="no_hp" class="font-weight-bold">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" onkeypress="return hanyaAngka(event);" value="{{ $profile->no_hp }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="address" class="font-weight-bold">Alamat</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $profile->address }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $profile->email }}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-center"><button class="btn btn-primary btn-block" type="submit">Simpan</button></p>
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