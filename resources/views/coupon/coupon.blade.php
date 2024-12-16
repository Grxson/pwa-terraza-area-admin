<!DOCTYPE html>
@include('layouts.navbar')
<html lang="en">
<head>
@laravelPWA
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
</head>
<body>

<!-- Page content-->
<div class="container">
    <div class="text-center mt-5">
        <h1>Tabla Cupones</h1>
    </div>
</div>

<!-- Buttons on top of the table -->
<div class="container btn-container text-center">
    <a href="{{ url('Coupon.new') }}" class="btn btn-success btn-custom">Agregar Cupon</a>
</div>

<!-- Table content -->
<div class="container table-container">
    @foreach ($data as $info)
        <div class="row mb-4">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $info['nombre'] }}</td>
                        </tr>
                        <tr>
                            <th>Descuento</th>
                            <td>{{ $info['descuento'] }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion</th>
                            <td>{{ $info['descripcion'] }}</td>
                        </tr>
                        <tr>
                            <th>Costo de puntos</th>
                            <td>{{ $info['costoPuntos'] }}</td>
                        </tr>
                        <tr>
                            <th>Estatus</th>
                            <td>{{ $info['status'] }}</td>
                        </tr>
                        <tr>
                            <th>Acciones</th>
                            <td class="btn-actions">
                                <a href="{{ url('Coupon.edit/'.$info['_id']) }}"> <img src="edit.png" alt=""></a>
                                <a href="{{ url('Coupon.delete/'.$info['_id']) }}"><img src="remove.png" alt=""></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>



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
            padding: 10px;
            font-weight: bold;

        }
        .table img {
            border-radius: 5px;
            width: 70px;
            height: 70px;
        }
        .table-bordered {
            border: 10px solid #A0830E;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #F2EBE3;
        }
        .product-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .product-info th {
            text-align: left;
            padding-right: 10px;

        }
        .product-info td {
            text-align: right;
        }
        .btn-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .btn-actions a {
            width: 100px;
        }
    </style>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
