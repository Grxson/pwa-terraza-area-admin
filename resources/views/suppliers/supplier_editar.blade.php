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

@if(Session::has('Exito'))
<div class="alert alert-exito" role="alert" >
{{Session::get('Exito')}}

</div>
@endif


<form method="post" class= "row" action="{{url('suppliers_actualizar/'.$data['id'])}}"enctype="multipart/form-data">
@csrf
<input type="hidden" name='id' value="{{$data['id']}}">
<div class= "col-6" >
  <label for="name" class= "form-label" >Nombre de la compañia</label>
  <input type="text" class= "form-control" name="name" placeholder= "Nombre del producto" value="{{$data['name']}}">
@error('name')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
</div>





<div class= "col-6" >
  <label for="contact_phone" class= "form-label" >Telefono</label>
  <input type="text" class= "form-control" name="contact_phone" placeholder= "Estatus del producto" minlength="10" value="{{$data['contact_phone']}}">
  @error('contact_phone')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
</div>


<div class= "col-6" >
  <label for="contact_email" class= "form-label" >Email</label>
  <input type="text" class= "form-control" name="contact_email" placeholder= "Email de contatco" value="{{$data['contact_email']}}">
  @error('contact_email')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
</div>



<div class= "col-6" >
  <label for="address" class= "form-label" >Dirección</label>
  <input type="text" class= "form-control" name="address" placeholder= "Dirección de la distrubuidora" value="{{$data['address']}}">
  @error('contact_email')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
</div>



<button type="submit">Guardar</button>
</form>


</div>



</body>
</html>
