@extends('layouts.master')

@section('main-content')
  <div class="breadcrumb">
      <ul>
          <li><a href="/">Home</a></li>
          <li><a href="{{route('users')}}">Usuarios</a></li>
          <li>Nuevo Usuario</li>
      </ul>
  </div>
  <div class="separator-breadcrumb border-top"></div>

<div class="row">

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                      <li>{{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="row">

<div class="col-md-8 mb-4">
      <div class="card text-left">
          <div class="card-body">
                <h3 class="card-title mb3">Nuevo Usuario</h3>
  
 <div class="box box-info">
    <form action="{{route('user.save')}}" method="POST" id="user-new-form" enctype="multipart/form-data" >
    {{ csrf_field() }}
      <input type="hidden" name="id" value="0">
      <input type="hidden" name="is_new" value="true">

        <div class="row">

            <div class="col-md-6 form-group mb-3">
                  <label><strong>Nombres</strong></label>
                  <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                  <label><strong>Apellidos</strong></label>
                  <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos" required="">
            </div>

            <div class="col-md-6 form-group mb-3">
              <label><strong>Identificacion:</strong></label>
                   <input type="text" name="identificacion" value="" class="form-control" placeholder="000000" maxlength="20" required>
            </div>
           <div class="col-md-6 form-group mb-3">
              <label><strong>Teléfono:</strong></label>
              <input type="number" name="telefono" class="form-control" placeholder="000000"
                        value="" maxlength="10" required>
            </div>
             <div class="col-md-6 form-group mb-3">
                   <label> <strong>Celular:</strong></label>
                    <input type="number" name="celular" class="form-control" placeholder="0000000000"
                        value="" maxlength="255" required>
            </div>
            <div class="col-md-6 form-group mb-3">
                   <label> <strong>Whatsapp:</strong></label>
                    <input type="number" name="whatsapp" class="form-control" placeholder="0000000000"
                        value="" maxlength="255" required>
            </div>
           <div class="col-md-6 form-group mb-3">
              <label><strong>Departamento:</strong></label>
                   <input type="text" name="departamento" value="" class="form-control" placeholder="" maxlength="20" required>
            </div>
           
           <div class="col-md-6 form-group mb-3">
              <label><strong>Ciudad:</strong></label>
                   <input type="text" name="ciudad" value="" class="form-control" placeholder="" maxlength="20" required>
            </div>

            <div class="col-md-6 form-group mb-3">
              <label><strong>Dirección:</strong></label>
                   <input type="text" name="ciudad" value="" class="form-control" placeholder="" maxlength="20" required>
            </div>
           
            
            <div class="col-md-6 form-group mb-3">
                    <label><strong>Email:</strong></label>
                    <input type="email" name="email" class="form-control" placeholder="example@email.com"
                        value="" maxlength="255" required>
            </div>
            <div class="col-md-6 form-group mb-3">
        
                   <label> <strong>Password:</strong></label>
                    <input type="password" name="password" class="form-control" placeholder=""
                        value="" maxlength="20" required>
               
            </div>

            <div class="col-md-6 form-group mb-3">
        
                   <label> <strong>Repetir Password:</strong></label>
                    <input type="password" name="password" class="form-control" placeholder=""
                        value="" maxlength="20" required>
               
            </div>
           
      
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('users') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>

    </form>

</div>
             
   </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>


</div>
@endsection
@section('bottom-js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


<script>



// just for the demos, avoids form submit
var form = $( "#user-new-form" );
$.validator.messages.required = 'Este campo es requerido';
$.validator.messages.email = 'Email invalido';

$('#user-new-form').validate({
  rules: {
        nombre: { required:true },
        email:{ required:true },
        identificacion:{ required:true },
        cargo:{ required:true },
        password:{ required:true },
        file: { 
              required:true ,
              extension:"jpg,jpeg,png",
              maxsize: 400000
        }
    },messages: {
                file:{
                    filesize:" El archivo no debe superar los 400 KB.",
                    extension:"Por favor subir imagenes con extensión .jpg o .png.",
                    maxsize:"Por favor suba una imagen."
                }
            },
    
})

$("#submit").validate({ 
 onsubmit: false,
  
 submitHandler: function(form) {  
   if ($(form).valid())
   {
       form.submit(); 
   }
   return false; // prevent normal form posting
 }
});



/*
$( "#submit" ).click(function(e) {
  e.preventDefault();
  if($( "#user-new-form" ).valid()){
    alert('valido');
    $( "#user-new-form" ).submit();
  }else{
    alert('ERRORES')
  }
});
*/
</script>
@endsection