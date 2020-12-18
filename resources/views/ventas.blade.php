<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Taninos - Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <meta name="theme-color" content="#563d7c">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    @include('topbar')


    <div class="container-fluid">
        <div class="row">

            @include('sideMenu')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Ventas</h1>
                </div>






                <div class="row">
                    <div class="col-12 mt-3 mb-5">
                        <h1 class="h4">Información General</h1>
                        <form class="needs-validation" method="POST" action="/ventas">
                            @csrf
                            <div class="row">
                                <div class="col-2">
                                    <label for="firstName">Cliente</label>
                                    <select class="form-control" name="rela_cliente" placeholder="" value=""
                                        required="">
                                        @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id}}">{{ $cliente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="firstName">Fecha de entrega</label>
                                    <?php
                            $month = date('m');
                            $day = date('d');
                            $year = date('Y');
                            
                            $today = $year . '-' . $month . '-' . $day; 
                            ?>
                                    <input type="date" class="form-control" name="fecha_entrega" placeholder=""
                                        value="{{$today}}" required="">
                                </div>
                                <div class="col-2">
                                    <label for="firstName">Importe Total</label>
                                    <input type="number" class="form-control" name="importe" placeholder="" value=""
                                        required="">
                                </div>
                              @include('comboMedioPago')
                                <div class="col-2">
                                    <label for="firstName">Observaciones</label>
                                    <input type="text" class="form-control" name="observaciones" placeholder=""
                                        value="">
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-success btn-md " style="    margin-top: 28px;"
                                        type="submit"><i class="fas fa-plus"></i></button>

                                </div>
                            </div>


                        </form>

                    </div>


                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                </div>
                <hr />

                <div class="row">
                    <div class="col-6 mt-3 mb-5">

                        <h3>Items</h3>
                        <form id="form_add_item" method="POST">
                            <div class="row">
                                <div class="col-6">
                                    @csrf
                                    <label for="firstName">Item</label>
                                    <select class="form-control" name="rela_producto" placeholder="" value=""
                                        required="">
                                        @foreach($productos as $prod)
                                        <option value="{{ $prod->id}}">{{ $prod->etiqueta}} - {{ $prod->stock}} unidades
                                            -
                                            ${{ $prod->precio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="firstName">Cantidad</label>
                                    <input type="number" class="form-control" name="cantidad" placeholder="" value="1"
                                        required="">
                                </div>
                                <div class="col-6">
                                    <a href="javascript:addItem();" class="btn btn-primary btn-sm btn-block"
                                        style="    margin-top: 35px;" type="submit">+</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:deleteCart();" class="btn btn-warning btn-sm btn-block"
                                        style="    margin-top: 35px;" type="submit">Vaciar</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-6 mt-3 mb-5">
                        <h3>Carrito</h3>

                        <div class="row">
                            <div id="carrito_render" class="col-12">
                                <br>
                                <label for="firstName">Items:</label>
                                @if ( Session::get('carrito') != null)
                                <ul>
                                    @foreach(Session::get('carrito') as $item)
                                    <li>{{ $prod->etiqueta}} {{ $prod->stock}}</li>
                                    @endforeach
                                </ul>
                                @else
                                <br>
                                <p>Carrito vacío</p>
                                @endif
                            </div>
                        </div>


                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif


                        @if ($message = Session::get('false'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>
                </div>
                <hr />


        </div>





    </div>
    </main>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js">
    </script>
    <script src="https://kit.fontawesome.com/69a17891ad.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $('#productos').DataTable();


    });


    function toggleAdd() {
        $('addProd').toggle(250);
    }

    function addItem() {

        var fd = new FormData(document.getElementById("form_add_item"));

        $.ajax({
            url: "/addCart",
            type: "POST",
            data: fd,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#carrito_render').html('Loading...');
            }
        }).done(function(data) {
            $('#carrito_render').html(data);
        });

    }

    function deleteCart() {

        var fd = new FormData(document.getElementById("form_add_item"));

        $.ajax({
            url: "/deleteCart",
            type: "POST",
            data: fd,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#carrito_render').html('Loading...');
            }
        }).done(function(data) {
            $('#carrito_render').html(data);
        });

    }
    </script>
</body>

</html>