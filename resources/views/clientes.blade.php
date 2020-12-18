


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
                    <h1 class="h2">Clientes</h1>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 mb-5">
                        <h1 class="h4">Alta de Cliente</h1>


                        <form class="needs-validation" method="POST" action="/clientes">
                            @csrf
                            <div class="row">
                                <div class="col-2">
                                    <label for="firstName">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="" value=""
                                        required="">
                                </div>

                                <div class="col-2">
                                    <label for="firstName">Telefono</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="" value=""
                                        required="">
                                </div>

                                <div class="col-2">
                                    <label for="firstName">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="" value=""
                                        required="">
                                </div>

                                <div class="col-2">
                                    <label for="firstName">Fecha Cumple</label>
                                    <input type="date" class="form-control" name="fecha_cumple" placeholder="" value=""
                                        required="">
                                </div>

                                <div class="col-2">
                                    <label for="firstName">Observaciones</label>
                                    <input type="text" class="form-control" name="obsrevaciones" placeholder=""
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

                    <hr />
                    <div class="col-12">


                        <table class="table" id="productos">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Cumple</th>
                                    <th scope="col">Obs</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <th scope="row">1</th>

                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->telefono }}</td>
                                    <td>{{ $cliente->direccion }}</td>
                                    <td>{{ $cliente->fecha_cumple }}</td>
                                    <td>{{ $cliente->telefono }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Acciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Editar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>
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