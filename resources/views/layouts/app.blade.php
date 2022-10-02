<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    

    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<style>
  .color-nav{
    background: rgb(228,222,222);
background: linear-gradient(90deg, rgba(228,222,222,1) 46%, rgba(157,152,152,1) 67%, rgba(73,68,68,1) 92%);
  }
</style>
<body>
    
    <div id="app">
                        @guest
                         
                      
                        @else
                        <nav class="navbar navbar-expand-md navbar-light navbar-laravel color-nav">
                          
                          <div class="container-fluid"> 
                            <nav class="navbar-brand"><a href="/home"><img src="img/sinfondo.PNG" width="105px;"></a></nav>              

                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">                              
                              <li class="nav-item dropdown">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lista Blanca</button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="/NumMovLB">Numero Moviles</a>
                                      <a class="dropdown-item" href="/NumFiLB">Numero Fijos</a>
                                    </div>
                              </li>
                              <li class="nav-item dropdown">
                              <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lista Negra</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/NumMovLN">Numero Moviles</a>
                              <a class="dropdown-item" href="/NumFiLN">Numero Fijos</a>
                          </div>
                            </li>
                            <a href="/historico"><button type="button" class="btn btn-secondary mr-2">Historicos de operaciones</button></a>
                            </div>
                              
                               
                            
                            </ul>
                        </div>

                                         
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style= "font-size:20px; color: white;">
                                    {{ Auth::user()->usuario }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('login') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                              </div>
            </div>
        </nav>
                        @endguest
                 
<main class="py-4">            
            @yield('content')
               
        </main>
        
    </div>

</body>



</html>
