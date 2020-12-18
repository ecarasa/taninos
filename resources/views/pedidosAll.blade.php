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
                    <h1 class="h2">Pedidos <span class="badge badge-warning">Total {{count ($pedidos)}} pedidos</span>
                    </h1>
                </div>






                <div class="row">

                    @if(!$pedidos)
                    <h3>No hay pedidos</h3>
                    @endif




                    @foreach($pedidos as $pedido)
                    <div class="col-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2"></strong>
                                <h3 class="mb-0" style="    font-size: 19px;">{{ $pedido->cliente->nombre }}
                                    (tel{{ $pedido->cliente->telefono }})</h3>
                                <h3 class="mb-0" style="    font-size: 19px;">{{ $pedido->cliente->direccion }}</h3>
                                <p>Total $ {{$pedido->importe}}.</p>
                                <div class="mb-1 text-muted">Entrega: {{ $pedido->fecha_entrega }}</div>
                                <div class="card-text mb-auto">

                                    <?php 
                           //var_dump($pedido->articulos)
                        ?>
                                    <ul>
                                        @foreach($pedido->articulos as $item)
                                        <li><?php    echo $item->cantidad .'x '.$item->vino->etiqueta . ' $'.($item->importe*$item->cantidad); ?>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <?php if ($pedido->estado == 1 ){ ?>
                                <span class="badge badge-warning">Pendiente</span>
                                <?php } ?>
                                <?php if ($pedido->estado == 2 ){ ?>
                                <span class="badge badge-success">Entregado</span>
                                <?php } ?>
                                <?php if ($pedido->estado == 3 ){ ?>
                                <span class="badge badge-danger">Cancelado</span>
                                <?php } ?>

                                <hr>

                                <div class="row" <?php if ($pedido->estado == 2 || $pedido->estado == 3  ){ ?>
                                    style='display: none;' } <?php } ?>>
                                    <div class="col-6">
                                        <form action='/cambio_estado_venta' method="POST">
                                            @csrf
                                            <input type="hidden" name="estado" value="2">
                                            <input type="hidden" name="id_venta" value="{{ $pedido->id }}">
                                            <button type="submit" class="btn btn-lg btn-success">Entregado</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <form action='/cambio_estado_venta' method="POST">
                                            @csrf
                                            <input type="hidden" name="estado" value="3">
                                            <input type="hidden" name="id_venta" value="{{ $pedido->id }}">

                                            <button type="submit" class="btn btn-xs btn-default">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach


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
    </script>
</body>

</html>


























