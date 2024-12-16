<!DOCTYPE html>
@include('layouts.NavbarSuppliers')

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Bare - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{('assets/style.css')}}">
    <link rel="stylesheet" href="{{('assets/js.js')}}">
</head>

<body>

    <!-- Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Tabla de proveedores</h1>

        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

<!------ Include the above in your HEAD tag ---------->


<!-- content goes here -->

<div class="py-32 bg-red-500 h-screen p-3"> </div>









<div class="container">
    <div class="row">
        <div class="table-responsive table-bordered movie-table">
            <table class="table movie-table">
                <thead>
                    <tr class="movie-table-head">
                        <th>Proveedor</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Estatus</th>
                        <th>Acciones</th>



                    </tr>
                </thead>


                <tbody>

                    @foreach ($data as $info)
                    <tr>
                        <td>{{$info['name']}}</td>
                       <td>{{$info['contact_email']}}</td>
                       <td>{{$info['contact_phone']}}</td>
                        <td>{{$info['address']}}$</td>
                        <td>{{$info['estatus']}}</td>

                        <td><a href="{{url('supplier_cambiar_estauts/'.$info['id'])}}" class="btn btn-primary">Reactivar</a>
                        </td>


                    </tr>
                    @endforeach




                </tbody>
            </table>
        </div>
    </div>
</div>