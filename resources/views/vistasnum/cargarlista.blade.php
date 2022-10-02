@extends('layouts.app')
<head>
    <title>Reportar numero en la lista blanca</title>
    <link rel="icon" href="/img/cne-logo.jpg">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    </head>

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 " >
        <div class="card card-default" style="box-shadow: #999 15px 15px 10px;">
            <center><div class="card-heading main-color-bg">
            <h3 class="card-title titulo-prueba" style=""> </h3>
            </div></center>
        <div class="card-body">
            <div class="row">
                <div class="row justify-content-center">
                <div class="col-md-11" >
                <form method="POST" action="{{ route('eliminar') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationDefault01">Nombre</label>
                            <input type="text" class="form-control" id="validationDefault01" disabled="" value="{{ Auth::user()->name }}">
                        </div>
                    <div class="col-md-4 mb-3">
                            <label for="validationDefault02">Apellido</label>
                            <input type="text" class="form-control" id="validationDefault02" disabled="" value="{{ Auth::user()->apellido }}">
                    </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationDefaultUsername">Usuario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    </div>
                                <input type="text" class="form-control" id="validationDefaultUsername" disabled="" value="{{ Auth::user()->usuario }}" aria-describedby="inputGroupPrepend2">
                                </div>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault03">Cedula de identidad</label>
                            <input type="text" class="form-control" id="validationDefault03" disabled="" value="{{ Auth::user()->cedula }}">
                    </div>
                <div class="col-md-6 mb-3">
                        <label for="validationDefault04">Motivo del reporte</label>
                        <select class="custom-select">
                            <option value="0">falsa alarma en lista blanca</option>
                            <option value="1">Falla en la lista</option>
                            <option value="2">Numero con llamadas ociosas</option>
                            <option value="3">Reportado directamente por CNE</option>
                        </select>
                </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefaultUsername">Codigo de empleado</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">P00</span>
                        </div>
                    <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Ingrese su P00" aria-describedby="inputGroupPrepend2" required>
                        </div>
            </div>
                </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">¿Seguro desea reportar el numero?</label>
                        </div>
                    </div>
{{-- /////////////////////////// pasar los datos a lista negra aqui, recuerda que ya debe tener el id o por lo menos algo que identifique el numero ok////////////////////////////////////////////////// --}}
                {{-- <form action="{{ route('eliminar', '$Elim->id') }}" method="post">
                    @csrf
                   
                    <button type="submit" class="btn btn-danger" >Pasar a lista negra</button>
                   </form> --}}

                    <input type="hidden" name="numero" class="num_telf">

                   <button type="submit" class="btn btn-danger" id="boton_negra">Pasar a lista negra
                   </button>
                </form>
            
                </div>
            </div>
        </div>
  </div>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        let hola = 'ver'
        let html = `Reportes del numero ${localStorage.getItem('num_telf')} <img src="/img/logoCNE2.jpg" width="10%" style="margin-left: 100px;">`
        $('.titulo-prueba').append(html);

        $('.num_telf').val(localStorage.getItem('num_telf'));


    });


</script>

 @endsection