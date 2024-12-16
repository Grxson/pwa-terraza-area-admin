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

        <!-- Centering the form only (not affecting navbar) -->
        <div class="d-flex justify-content-center">
            <div class="w-100" style="max-width: 600px;">
                <form method="POST" action="{{ url('Products.update/'.$data['_id']) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_id" value="{{ $data['_id'] }}">

                    <!-- Nombre del producto -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-center d-block">Nombre del producto</label>
                        <input type="text" class="form-control mx-auto" name="nombre" id="nombre" placeholder="Nombre del producto" value="{{ $data['nombre'] }}">
                        @error('nombre')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label text-center d-block">Precio</label>
                        <input type="number" class="form-control mx-auto" name="precio" id="precio" placeholder="Precio" value="{{ $data['precio'] }}">
                        @error('precio')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label text-center d-block">Descripción</label>
                        <input type="text" class="form-control mx-auto" name="descripcion" id="descripcion" placeholder="Descripción" value="{{ $data['descripcion'] }}">
                        @error('descripcion')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Valor puntos -->
                    <div class="mb-3">
                        <label for="valorPuntos" class="form-label text-center d-block">Valor puntos</label>
                        <input type="number" class="form-control mx-auto" name="valorPuntos" id="valorPuntos" placeholder="Valor puntos" value="{{ $data['valorPuntos'] }}">
                        @error('valorPuntos')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo -->
                    <div class="mb-3">
                        <label for="tipo" class="form-label text-center d-block">Tipo</label>
                        <input type="text" class="form-control mx-auto" name="tipo" id="tipo" placeholder="Tipo" value="{{ $data['tipo'] }}">
                        @error('tipo')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Imagen -->
                    <div class="mb-3">
                        <label for="imagen" class="form-label text-center d-block">Imagen</label>
                        <input type="file" class="form-control mx-auto" name="imagen" id="imagen" accept="image/*">
                        @if ($data['imagen'])
                            <img src="{{ $data['imagen'] }}" alt="Imagen del producto" class="mt-2 d-block mx-auto" width="100" height="100">
                        @endif
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
