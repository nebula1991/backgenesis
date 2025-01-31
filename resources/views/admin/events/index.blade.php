@extends('adminlte::page')


@section('title', 'AdminLTE')



@section('content')
<div class="container">
       <div class="row">
            <div class="col"></div>
            <div class="col-8"><div id="calendar"></div></div>
            <div class="col"></div>
    
    </div> 
     

</div>

{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#event">
  Launch
</button> --}}

<!-- Modal -->
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recordatorio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

     
            <div class="modal-body">
                <form id="formEvent" action="#">
                    @csrf

                    <input type="hidden" id="eventId" name="eventId">

                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text"
                        class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Titulo">
                    </div>

                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <input type="text"
                        class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
                    </div>


                      <div class="form-group">
                        <label for="start">Fecha Inicio</label>
                        <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                      </div>
                      
                      <div class="form-group">
                        <label for="end">Fecha Fin</label>
                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      </div>
                </form>


            </div>

    

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSave">Guardar</button>
                <button type="button" class="btn btn-warning" id="btnEdit">Modificar</button>
                <button type="button" class="btn btn-danger" id="btnDestroy">Eliminar</button>
                <button type="button" class="btn btn-default" id="btnCancel" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>



@stop


@section('js')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {


    let formulario = document.getElementById("formEvent");

    let calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        locale:'es',

        headerToolbar: {
        start: 'prev,next today', 
        center: 'title',
        end: 'dayGridMonth, timeGridWeek, listWeek',
        },
        dateClick:function(info){
            $('#start').val(info.dateStr);
            $('#end').val(info.dateStr);
            // var evento = info.event;
            $("#event").modal(); // Mostrar modal
            // console.log(info);
            // calendar.addEvent({title:"Evento x", date:info.dateStr});
                formulario.reset(); // Limpiar el formulario
                formulario.start.value=info.dateStr;
                formulario.end.value=info.dateStr;
                $('#btnEdit, #btnDestroy').hide();
                $('#btnSave').show();
               
        },
        eventClick: function(info){
            console.log("ID del Evento:", info.event.id);
            console.log(info);
            console.log(info.event.title);
            console.log(info.event.descripcion);
            console.log(info.event.start);
            console.log(info.event.end);
            console.log(info.event.extendedProps.descripcion);
            

            // Guardar el ID en el campo oculto
            $('#eventId').val(info.event.id);

            $('#title').val(info.event.title);

            $('#descripcion').val(info.event.extendedProps.descripcion);

            
            // Obtener la fecha en formato local (sin ajustes de zona horaria)
            let startDate = info.event.start ? info.event.start.toLocaleDateString('en-CA') : ""; // Formato YYYY-MM-DD
            let endDate = info.event.end ? info.event.end.toLocaleDateString('en-CA') : startDate;

            $('#start').val(startDate);
            $('#end').val(endDate);
          
            $('#btnSave').hide(); // Ocultar botón de guardar
            $('#btnEdit, #btnDestroy').show(); // Mostrar botones de modificar y eliminar
            $("#event").modal("show"); // Mostrar modal
        },
     
        events: "{{ url('admin/events/show') }}",
    });
    calendar.render();

    $('#btnSave').click(function(){

        let ObjEvento = recolectarDatosGUI("POST");
        Enviarinformacion('',ObjEvento);
  

    });

    $('#btnEdit').click(function(){
        let idEvento = $('#eventId').val(); 
        let ObjEvento = recolectarDatosGUI("PATCH");
        console.log("Actualizando evento con ID:", idEvento);
        Enviarinformacion(idEvento,ObjEvento);
    

    });

    $('#btnDestroy').click(function(){
        
        let ObjEvento = recolectarDatosGUI("DELETE");

        Enviarinformacion('/'+$('#eventId').val(),ObjEvento);


    });



    function recolectarDatosGUI(method){
        newEvent = {
            id: $('#eventId').val(),
            title: $('#title').val(),
            descripcion: $('#descripcion').val(),
            start: $('#start').val(),
            end: $('#end').val(),
            '_token': $("meta[name='csrf-token']").attr("content"),
            'method': method,
        }
        return(newEvent);
    }


        function Enviarinformacion(accion,ObjEvento){
            let urlBase = "{{url('admin/events')}}";
            let urlFinal = accion ? `${urlBase}/${accion.replace(/^\/+/, '')}` : urlBase;
            let method = ObjEvento.method; // Usar el método definido en recolectarDatosGUI
            
            console.log("Enviando a:", urlFinal, "Método:", method);

            $.ajax(
                {
                    type: method,// POST, PATCH o DELETE
                    url:urlFinal,
                    data:ObjEvento,
                    success:function(response){
                        console.log("Evento procesado:", response);   
                        $("#event").modal("hide");  // Cerrar el modal
                        calendar.refetchEvents();  // Recargar los eventos del calendario

                    },   
                    error: function(xhr, status, error) {
                    console.error("Error:", error);
                    alert("Hubo un error al procesar la solicitud.");
                }

            }
        );
    }

});

</script>

@stop

