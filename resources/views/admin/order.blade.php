@extends('admin.master')
@section('title')
    Produk PetsQu Shop
@endsection

@section('content')
    <div class="container mt-5 pt-3"></div>
    <div class="my-4">        
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('status') }}
            </div>
        @endif
        <script>
          $(".alert").alert();
        </script>
        <table id="infaq" class="table table-hover table-striped">
            <thead class="thead-dark">
                    <th>#</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                    <th>Opsi</th>
            </thead>
                
            <tbody>
                <?php $no=1; ?>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ date('d F Y', strtotime($order->created_at)) }}</td>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        @if($order->status == 0)
                            <p class="badge badge-warning">Sedang diproses</p>
                        @else
                            <p class="badge badge-success">Selesai</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.detail_order', $order->id) }}"class="btn btn-sm btn-primary">Detail</a>
                        <a href="{{ route('admin.edit_order', $order->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.delete_order', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Insert -->            
        <!-- Modal -->
        <div class="modal fade" id="input_product" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                        <form action="{{ route('admin.input_product') }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Masukkan Nama Produk">
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control" name="description" placeholder="Masukkan Deskripsi">
                            </div>
                            <div class="form-group mb-0">
                                <label for="price">Harga</label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control" name="price" placeholder="Masukkan Harga">
                            </div>
                            <div class="form-group mb-0">
                                <label for="picture">Gambar Produk</label>
                                <input type="file" name="picture" id="picture">
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    <!--/ Modal Insert -->
    </div>
@endsection