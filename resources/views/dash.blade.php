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
                    <h1 class="h2">Dashboard</h1>

                </div>

                <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                        <a class="card card-hover-shadow h-100" href="#">
                            <div class="card-body">
                                <h6 class="card-subtitle">Venta Mensual</h6>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-12">
                                        <span class="card-title h2">${{ $importeVendidoMesActual[0]->importe }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                        <a class="card card-hover-shadow h-100" href="#">
                            <div class="card-body">
                                <h6 class="card-subtitle">Cantidad Pedidos Entregados</h6>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-12">
                                        <span class="card-title h2">{{ $cantidadEntregadasVendidoMesActual }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>





                </div>


                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Caja - Falta restar deudas</h1>
                </div>


                <div class="row">

                    <div class="col-3">
                        <div class="alert alert-primary" role="alert">
                            <div class="card-body">
                                <h6 class="card-subtitle" style="text-transform: capitalize;">Total IN</h6>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-12">
                                        <span class="card-title h2"><i class="fas fa-money-bill-wave"></i>
                                            ${{ $carteraIngresaImporte[0]->importe }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="alert alert-primary" role="alert">
                            <div class="card-body">
                                <h6 class="card-subtitle" style="text-transform: capitalize;">Total OUT</h6>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-12">
                                        <span class="card-title h2"><i class="fas fa-money-bill-wave"></i>
                                            ${{ $carteraSaleImporte[0]->importe }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="alert alert-primary" role="alert">
                            <div class="card-body">
                                <h6 class="card-subtitle" style="text-transform: capitalize;">Total Deuda</h6>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-12">
                                        <span class="card-title h2"><i class="fas fa-money-bill-wave"></i>
                                            ${{ $carteraDeudaImporte[0]->importe }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="alert alert-primary" role="alert">
                            <div class="card-body">
                                <h6 class="card-subtitle" style="text-transform: capitalize;">Balance</h6>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-12">
                                        <span class="card-title h2"><i class="fas fa-money-bill-wave"></i>
                                            $<?php echo $carteraIngresaImporte[0]->importe - $carteraDeudaImporte[0]->importe - $carteraSaleImporte[0]->importe; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-6 col-lg-6">
                    <H4>Top 15 stock altos</h4>
                        @foreach($prodAltoStock as $prod)

                        <p> x{{ $prod->stock }} - {{ $prod->etiqueta }}</p>

                        @endforeach

                    </div>


                    <div class="col-sm-6 col-lg-6">
                    <H4>Top 15 stock bajo</h4>

                        @foreach($prodBajoStock as $prod)

                        <p> x{{ $prod->stock }} - {{ $prod->etiqueta }}</p>

                        @endforeach
                    </div>


                    <div class="col-sm-6 col-lg-6">
                    <H4>SIN STOCK</h4>
                        @foreach($prodCeroStock as $prod)

                        <p> x{{ $prod->stock }} - {{ $prod->etiqueta }}</p>

                        @endforeach

                    </div>
                </div>

                <div class="row" style="display: none;">

                    <div class="col-sm-6 col-lg-6">
                        <div id="curve_chart" style="width: 100%; height: 500px"></div>

                    </div>


                    <div class="col-sm-6 col-lg-6">
                        <div id="curve_chart_vtas" style="width: 100%; height: 500px"></div>

                    </div>
                </div>



        </div>
        </main>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/69a17891ad.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['line']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Mes', 'Facturación'],
            ['Septiembre', 188000],
            ['Octubre', 135678],
            ['Noviembre', 190456],
            ['Diciembre', 110000]
        ]);

        var options = {
            title: 'Facturacion',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.charts.Line(document.getElementById('curve_chart'));

        chart.draw(data, options);


        var data = google.visualization.arrayToDataTable([
            ['Mes', 'Ventas'],
            ['Septiembre', 190],
            ['Octubre', 120],
            ['Noviembre', 188],
            ['Diciembre', 119]
        ]);

        var options = {
            title: 'Cantidad Ventas',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.charts.Line(document.getElementById('curve_chart_vtas'));

        chart.draw(data, options);

    }
    </script>
</body>

</html>