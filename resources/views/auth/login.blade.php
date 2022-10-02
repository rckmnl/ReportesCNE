@extends('layouts.app')
<head>
    
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title> Inicio de sesion </title>
    <link rel="icon" href="/img/cne-logo.jpg">
    
    <header>
    <div id="cabezera">
        <center>
    <img src="/img/principal.gob.png" width="90%"; style="margin: auto; class="img-fluid" alt="Responsive image">
    </center>
    </div>
         
      
    <div id= "cabezera1"> 
        <img src="/img/logoCANTV1.png" width="16%" style="margin-top:10px; margin-left: 5%; float:left;"class="img-fluid" alt="Responsive image">
        


    </div>
        
    </header>
</head>
<style>


#datos{
     background: rgb(251,251,251);
background: linear-gradient(90deg, rgba(251,251,251,1) 0%, rgba(157,152,152,1) 0%, rgba(73,68,68,1) 96%);
color: white;
text-align: center;


}

#cuadro{
    
    box-shadow: #999 15px 15px 10px;
    margin-top: 70px;
    width: 500px;
   
  
}

}

 
</style>
<body>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="cuadro">
                <div class="card-header " id="datos"> <h3 class="card-title"> <img src="/img/logoCNE2.jpg" width="20%"style= "margin-right: 30px;">Control de transacciones </h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fas fa-user fa-lg" ></i></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-unlock-alt fa-lg"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-8">
                                <center>
                                <button type="submit" class="btn btn-md" style="border-color: black;">
                                    <i class="fas fa-sign-out-alt fa-lg"></i>
                                    {{ __('Ingresar') }}
                                </button></center>                         
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
