<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: #2A93D5 !important;">
            <div class="container">
            <a class="navbar-brand" href="index.php"><img alt="PQS" src="{{ asset('img/pqs.png') }}" width="50px" height="50px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.index') }}" style="color: white;">Beranda
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.product') }}" style="color: white;">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#masjid" style="color: white;">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#masjid" style="color: white;">Pelanggan</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            
                            @else
                            <li class="nav-item">
                                <button type="button" name="commit" class="btn btn-outline-light" data-toggle="modal" data-target="#login" style="color: black;">Login</button>
                            </li>
                            @endauth
                        @endif                 
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Navbar -->

        <!-- Isi -->
            <div class="container">
                @yield('content')    
            </div>

        <!-- /Isi -->
    </body>
    <!-- Form Login -->
    <div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-body">
          <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <img class="rounded mb-5 mx-auto d-block" src="{{ asset('img/pqs.png') }}" width="100px" height="100px">

                    <!-- ACTIONNYA MENGARAH PADA URL /LOGIN -->
                    <!-- UNTUK MENCARI TAU TUJUAN URI DARI ROUTE NAME DIBAWAH, PADA COMMAND LINE, KETIKKAN PHP ARTISAN ROUTE:LIST DAN CARI URI YANG MENGGUNAKAN METHOD POST -->
                    <!-- KARENA URI /LOGIN DENGAN METHOD GET DIGUNAKAN UNTUK ME-LOAD VIEW HALAMAN LOGIN -->
                    <!-- PENGGUNAAN ROUTE() APABILA ROUTING TERSEBUT MEMILIKI NAMA, ADAPUN NAMENYA ADA PADA COLOM NAME ROUTE:LIST -->
                    <!-- JIKA ROUTINGNYA TIDAK MEMILIKI NAMA, MAKA GUNAKAN HELPER URL() DAN DIDALAMNYA ADALAH URINYA. CONTOH URL('/LOGIN') -->
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                          
                            <!-- $errors->has('email') AKAN MENGECEK JIKA ADA ERROR DARI HASIL VALIDASI LARAVEL, SEMUA KEGAGALAN VALIDASI LARAVEL AKAN DISIMPAN KEDALAM VARIABLE $errors -->
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                type="email" 
                                name="email"
                                placeholder="Email Address" 
                                value="{{ old('email') }}" 
                                autofocus 
                                required>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                type="password" 
                                name="password"
                                placeholder="Password" 
                                required>
                        </div>
                        <div class="row">
                            @if (session('error'))
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            </div>
                            @endif

                            <div class="col-6">
                                <button class="btn btn-link px-0" type="button">Forgot password?</button>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary px-4">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
    <!-- /Form Login -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable({
        dom: 
            "<'row'<'col-sm-4 pull-left'B><'col-sm-3'l><'col-sm-5 pull-right'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                    extend: 'excel',
                    text:'Excel',
                    titleAttr: 'Data Jamaah',
                    "className": 'btn btn-info'
                },
                {
                    extend: 'print',
                    text:'Print',
                    titleAttr: 'Data Jamaah',
                    "className": 'btn btn-info'
                },
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
            });
            $('input').addClass('form-control');
        });
    </script>
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))            
                return false;
            return true;
        }
    </script>
</html>