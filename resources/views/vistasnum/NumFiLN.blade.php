@extends('layouts.app')

<head>
	<title>Numeros Fijos Lista Negra</title>
	 <link rel="icon" href="/img/cne-logo.jpg">
</head>
<link href="{{ asset('js/DataTables/datatables.min.css') }}"/>
<style>
	.ver{
		width: 20px !important;
	}

</style>
@section('content')
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
      @if(session()->has('status1'))
              <div class="alert alert-success">{{ session('status1') }}</div>
      @endif
	
<table id="example" class="table table-bordered table-md-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Numero fijos en lista negra</th>
                <th>Llamadas Efectivas</th>
                <th>Llamadas No Efectivas</th>
                <th>Total de llamadas</th>
            </tr>
        </thead>
        <tbody>

        	
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
            
    </tbody>
</table>

</div>
</div>
</div>

<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script>
	$(document).ready(function() {
    // $('#example').DataTable();

    		$('#example').DataTable({

    			responsive: true,

          "order": [[ 0, "desc" ]], //ordenar ASC/DESC de manera predeterminada

      			"language": {
	      			// texto de los botones de paginacion ( por defecto vienen en ingles)
    				"paginate": {
      					"first": 	"Primera",
        				"last": 	"Ultima",
        				"next": 	"Siguiente",
        				"previous": "Anterior"
  					// // texto de los botones de paginacion
    				},
    				"decimal": ",",
    				"search": "Buscar:",
    				"loadingRecords": "Cargando...",
    				"processing":     "Procesando...",
    				"lengthMenu": "Mostrar _MENU_ registros por página",
		            "zeroRecords": "No hay coincidencias",
		            "info": "Mostrando página _PAGE_ de _PAGES_",
		            "emptyTable": "No hay registros en la tabla",
		            "infoEmpty": "No hay registros disponibles",
		            "infoFiltered": "(filtrado de un total de _MAX_ registros)"
  				}
    		});

          $('.custom-select').css('width','60px');
          $('#example_filter').css('margin-left','50%');
          $('input.form-control').css('display','inline').css('width','210px').css('margin-left','4px');
} );
</script>	
</body>



@endsection
