@include('layouts.NavbarSuppliers')

<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<div class="container">


<form method="post" class= "row" action="{{url('supplier_almacenar')}}" enctype="multipart/form-data">
@csrf
<div class= "col-6" >
  <label for="name" class= "form-label" >Nombre de la compañia</label>
  <input type="text" class= "form-control" name="name" placeholder= "Nombre del producto"  value="{{old('name')}}">
@error('name')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
</div>



<div class= "col-6" >
  <label for="contact_email" class= "form-label" >Correo</label>
  <input type="text" class= "form-control" name="contact_email" placeholder= "Correo del contacto" value="{{old('contact_email')}}">
@error('contact_email')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror

</div>

<div class= "col-6" >
  <label for="address" class= "form-label" >Dirección</label>
  <input type="text" class= "form-control" name="address" placeholder= "Dirección del distribuidor" value="{{old('address')}}">
  @error('address')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
</div>




<div class= "col-6" >
  <label for="contact_phone" class= "form-label" >Telefono</label>
  <input type="text" class= "form-control" name="contact_phone" placeholder= "Telefono de la distribuidorar" minlength="10" value="{{old('contact_phone')}}">
  @error('contact_phone')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
</div>

 
<button type="submit" style="padding: 10px; margin-top: 50px; background-color: #56A0D3; border: none; color:aliceblue">Guardar</button>
</form>


</div>



</body>
</html>
