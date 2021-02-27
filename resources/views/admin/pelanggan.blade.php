@extends('admin.master')
@section('title')
    Produk PetsQu Shop
@endsection

@section('content')
    <div class="container mt-5 pt-3">
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
                        <th>Nama Pelanggan</th>
                        <th>No. Hp</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Opsi</th>
                </thead>
                    
                <tbody>
                    <?php $no=1; ?>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->no_hp }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <form action="{{ route('admin.delete_pelanggan', $customer->id) }}" method="POST">
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
    </div>
@endsection