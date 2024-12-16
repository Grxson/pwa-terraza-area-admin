<!DOCTYPE html>
@include('layouts.NavbarCook')
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
    <a href="{{ url('Order.update/'.$id) }}" class="btn btn-success btn-custom">Listo!</a>
    
</div>

<!-- Table content -->
<div class="container table-container">
    <div class="row">
        <div class="table-responsive table-bordered">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Platillo</th>
                        <th>imagen</th>
                        <th>Cantidad</th>

                    </tr>
                </thead>
            <tbody>

                    @foreach ($data as $info)
                    <tr>
                    @foreach ($info['details'] as $details)
                        <td>{{ $details['nombre']}}</td>
                        <td> <img src="{{ $details['imagen'] }}" alt="Imagen" width="50" height="50"></td>
                        @endforeach
                        <td>{{ $info['cantidad'] }}</td>


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
</html>
