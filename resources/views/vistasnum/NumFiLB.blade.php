@extends('layouts.app')

<head>
  <title>Numeros moviles Lista blanca</title>
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
      <table id="example" class="table table-bordered table-md-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Numero moviles en lista blanca</th>
                <th>Llamadas Efectivas</th>
                <th>Llamadas No Efectivas</th>
                <th>Total de llamadas</th>
            </tr>
        </thead>
        <tbody>
          @foreach($fijos as $fijo)
            <tr>
              <td>
                <form action="{{ route('Detallado') }}" method="post">
                  @csrf
                  <input type="hidden" name="id_dato" value="{{$fijo->id}}" class="id_dato">
                    <button type="submit" class="btn btn-link detallado">
                      {{ $fijo->numlista}}
                    </button>
                    <button type="button" class="btn btn-link modales" data-toggle="modal" data-target="#DetallesDeLlamadas" style="display:none;">
                      {{ $fijo->numlista}}
                    </button>
                </form>
              </td>
              <td>{{ $fijo->llam_ef}}</td>
              <td>{{ $fijo->llam_no_ef}}</td>
              <td>{{ $fijo->total}}</td>
            </tr>
         @endforeach  
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="DetallesDeLlamadas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class=" modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles e historico de llamadas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Salir">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="example" class="table table-bordered table-md-responsive" style="width:100%">
        <thead>
            <tr>
              <td>Numero de llamada</td>
              <td>Hora de la llamada</td>
              <td>Duracion de la llamada</td>
            </tr>
        </thead>
        <tbody class="valores">
                     
        </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>

        {{-- aqui ya debe tener ese algo que identifica el numero y luego pasarlo para poder enviarlo a lista negra --}}
        <a href="{{ route('LisNaListB') }}"><button type="button" class="btn btn-primary">formulario lista negra</button></a>
      </div>
    </div>
  </div>
</div> 
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script>

  $(document).ready(function(){
    
  
    $('.detallado').click(function() { 
      let id_dato = $(this).parents('form').children('input.id_dato').val();
      let num_telf = $(this).text();
      localStorage.setItem("num_telf", num_telf);
      console.log(id_dato)
      $.ajax({
        headers: {'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr("content") },
        type: 'POST',
        url: $(this).parents('form').attr('action'),
        data: { 
          "id": id_dato,
        },
        success: function(detallado) {
              $('.modales').trigger('click');

              for (var i = 0; i < detallado.prueba.length; i++) {
                 console.log(detallado.prueba[i].numerodellamada);
                 let llamada = detallado.prueba[i].numerodellamada;
                 let hora = detallado.prueba[i].hora;
                 let duracion = detallado.prueba[i].duracion;
                 let tabla = `
                  <tr>
                    <td>${llamada}</td>
                    <td>${hora}</td>
                    <td>${duracion}</td>
                  </tr> `
                 $('.valores').append(tabla);


              }
             $(".modal").on("hidden.bs.modal", function(){
              $(".valores").html("");
});

            }

      })
      return false;
    });
  });
</script>
<script>
  $(document).ready(function() {


        $('#example').DataTable({

          responsive: true,

          "order": [[ 0, "desc" ]], //ordenar ASC/DESC de manera predeterminada

            "language": {
              // texto de los botones de paginacion ( por defecto vienen en ingles)
            "paginate": {
                "first":  "Primera",
                "last":   "Ultima",
                "next":   "Siguiente",
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
</html>


@endsection

