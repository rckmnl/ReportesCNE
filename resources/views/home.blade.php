@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Control de transacciones</title>
    <link rel="icon" href="/img/cne-logo.jpg">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
    <style>
      .bg-g{
        background-color: #efecec !important;
      }
    </style>
@section('content')
<div class="row justify-content-center">
    
   
    <div class="col-md-9 " >
            @if(session()->has('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if(session()->has('validar'))
              <div class="alert alert-danger">{{ session('validar') }}</div>
            @endif
          <center>  <div class="card card-default" style="box-shadow: #999 15px 15px 10px;">
              <div class="card-heading main-color-bg">
                <h3 class="card-title" style=""> Control de transacciones <img src="/img/logoCNE2.jpg" width="10%" style="margin-left: 100px;"></h3>
              </div>
            <div class="card-body">
              <div class="row"> <div class="col-md-3">
                  <div class="card bg-g" style="padding: 20px;">
                    <h2><i class="fas fa-phone"></i> {{ $cantfiLB }}</h2>
                    <h5>Total de numeros fijos en lista blanca</h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-g" style="padding: 19.5px;">
                    <h2><i class="fas fa-mobile-alt"></i> {{ $cantmovLB }}</h2>
                    <h5> Total de numeros moviles en lista blanca</h5>
                  </div>
                </div>
               <div class="col-md-3" >
                  <div class="card bg-g" style="padding: 20px;">
                    <h2><i class="fas fa-clipboard-list"></i> 
                   {{ $totalNum }} </h2>
                    <h5> Total de numeros en lista blanca  </h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-g" style="height: 135px;">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 
                      <canvas id="myChartefec"></canvas></h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="card bg-g" style="padding: 20px;">
                    <h2><i class="fas fa-clipboard-list"></i> 406</h2>
                    <h5> Total de numeros en lista negra  </h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-g" style="padding: 19.5px;">
                    <h2><i class="fas fa-mobile-alt"></i> 24</h2>
                    <h5> Total de numeros moviles en lista negra</h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-g" style="padding: 20px;">
                    <h2><i class="fas fa-phone"></i> 66</h2>
                    <h5>Total de numeros fijos en lista negra</h5>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-g" style="height: 135px;">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 
                      <canvas id="myChartnoefec"></canvas></h2>
                  </div>
                </div>
            </div>
              <br>
              <a><button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-save fa-lg"></i>&nbsp;Cargar lista blanca</button></a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="img/logoCANTV1.PNG" width="15%" style="margin-top:3px; float:left;"class="img-fluid" alt="Responsive image"> <Center>&nbsp;&nbsp;&nbsp;Cargar lista entregada por el CNE</Center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  


      <div >
        
<form class="form-group" method="post" action="{{ route('encabezado') }}" enctype="multipart/form-data">
        @csrf
        <label for=""><input type="file" name="listablanca" accept=".txt"></label>
       
        <button type="submit" class="btn-btn-secundary"> Guardar </button>
   </form>
      
    </div>
  </div>
</div> 
              
          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('myChartefec');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Moviles', 'Fijos'],
        datasets: [{
            label: '# of Votes',
            data: [{{ $cantmovLB }}, {{ $cantfiLB }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {}
});
</script>
<script>
var ctx = document.getElementById('myChartnoefec');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Moviles', 'Fijos'],
        datasets: [{
            data: [12, 19],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {}
});
</script>
  @endsection
</html>
