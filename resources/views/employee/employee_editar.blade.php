@include('layouts.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Optionally include Bootstrap CSS if not already done in the layout -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
    <!-- Navbar remains untouched -->
    <div class="container mt-5">
        @if(Session::has('Exito'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Exito') }}
            </div>
        @endif


        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!-- Centering the form only (not affecting navbar) -->
        <div class="d-flex justify-content-center">
            <div class="w-100" style="max-width: 600px;">
                <form method="POST" action="{{ url('Employee.update/'.$data['_id']) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-center d-block">Nombre</label>
                        <input type="text" class="form-control mx-auto" name="nombre" id="nombre" placeholder="Nombre del producto" value="{{$data['nombre']}}">
                        @error('nombre')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- PATERNO -->
                    <div class="mb-3">
                        <label for="apellidoP" class="form-label text-center d-block">Apellido Paterno</label>
                        <input type="text" class="form-control mx-auto" name="apellidoP" id="apellidoP" placeholder="Primer apellido" value="{{$data['apellidoP']}}">
                        @error('precio')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- MATERNO -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label text-center d-block">Apellido Materno</label>
                        <input type="text" class="form-control mx-auto" name="apellidoM" id="apellidoM" placeholder="Descripción" value="{{$data['apellidoM']}}">
                        @error('descripcion')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                      <!--TELEFONO-->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label text-center d-block">Telefono</label>
                        <input type="text" class="form-control mx-auto" name="telefono" id="telefon" placeholder="Telefono celular" value="{{$data['telefono']}}">
                        @error('descripcion')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>





                    <!-- Valor puntos -->
                    <div class="mb-3">
                        <label for="valorPuntos" class="form-label text-center d-block">Email</label>
                        <input type="email" class="form-control mx-auto" name="email" id="email" placeholder="Favor de usar correos solo registrados" value="{{$data['email']}}">
                        @error('valorPuntos')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optionally include Bootstrap JS if not already done in the layout -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
