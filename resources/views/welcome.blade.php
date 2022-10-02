<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Control de transacciones de eventos electorales</title>
        <link rel="icon" href="/img/cne-logo.jpg">
        <script src="{{ asset('js/app.js') }}"></script>
        

       
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        
        <style>
        #lola{
  background: rgb(251,251,251);
background: linear-gradient(90deg, rgba(251,251,251,1) 0%, rgba(157,152,152,1) 0%, rgba(73,68,68,1) 96%););
        }
           
            #boton{

                background: #8A0808
                padding: 10px;
                margin-right: 5%;
                border-radius: 10px;
                box-shadow: #999 5px 5px 10px;


            }

            .full-height {
                height: 90vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            
            

            .links > a {
                color: #ffff;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <header class="container-fluid">
         <img src="/img/222.png" width="20%" style=" margin-top: 20px; margin-left: 80px;" >
         <img src="/img/111.png" width="30%" style="margin-left: 150px; margin-top: 40px;">
         <img src="/img/333.png" width="10%" style=" margin-top: 50px; margin-left: 200px;" >
        </header>
    </head>
    <body id="lola"> 
            
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links" id="boton">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>
                    @endauth
                </div>
            @endif

<div class="mx-auto" >
            <div id="demo" class="carousel slide" data-ride="carousel">
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
              </ul>
              <div class="carousel-inner">
                
                <div class="carousel-item active">
                  <center><img src="img/caru1.jpg" class="rounded mx-auto d-block" alt="ingles" width="1040" height="450"></center>
                   
                </div>
                <div class="carousel-item">
                  <img src="img/caru2.jpg" class= "rounded mx-auto d-block" alt="spanish" width="1040" height="450">
                    
                </div>
                <div class="carousel-item">
                  <img src="img/caru3.jpg" class= "rounded mx-auto d-block" alt="ying" width="1040" height="450">
                 </div>
                 <div class="carousel-item">
                  <img src="img/caru4.jpg" class= "rounded mx-auto d-block" alt="ying" width="1040" height="450">
                </div>
                

              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
         </div>
    </div>
</body>
</html>
