<!DOCTYPE html>
@include('layouts.navbar')
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Productos</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{('assets/style.css')}}">
    <link rel="stylesheet" href="{{('assets/js.js')}}">
    <style>
        /* Custom styles to improve the look */
        .table-container {
            margin-top: 40px;
        }
        .btn-container {
            margin-bottom: 20px;
        }
        .btn-custom {
            margin-right: 10px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table img {
            border-radius: 5px;
        }
    </style>
</head>
<body>


<!-- Page content-->
<div class="container">
    <div class="text-center mt-5">
        <h1>Tabla Productos</h1>
    </div>
</div>

<!-- Buttons on top of the table -->
<div class="container btn-container text-center">
    <a href="{{ url('Products.new') }}" class="btn btn-success btn-custom">Agregar Producto</a>
    <a href="{{ url('Products.export') }}" class="btn btn-info btn-custom">Exportar CSV</a>
</div>

<!-- Table content -->
<div class="container table-container">
    <div class="row">
        <div class="table-responsive table-bordered">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Categoria</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th>Estatus</th>
                        <th>Puntos</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $info)
                    <tr>
                        <td>{{ $info['nombre'] }}</td>
                        <td>{{ $info['tipo'] }}</td>
                        <td>{{ $info['descripcion'] }}</td>
                        <td>{{ $info['precio'] }}</td>
                        <td>{{ $info['status'] }}</td>
                        <td>{{ $info['valorPuntos'] }}</td>
                        <td>
                            <img src="{{ $info['imagen'] }}" alt="Imagen" width="50" height="50">
                        </td>
                        <td>
                            <a href="{{ url('Products.edit/'.$info['_id']) }}" class="btn btn-warning mr-3">Editar</a> 
                            <BR></BR>
                            <a href="{{ url('Products.delete/'.$info['_id']) }}" class="btn btn-danger">Descontinuar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS -->
<script src="js/scripts.js"></script>
</body>

<style>


    
</style>
</html>
