@extends('adminlte::page')


@section('title', 'AdminLTE')

@section('content_header')

    <h1>Calendario</h1>

@stop

@section('content')
<div class="container">

    <div id="calendar"></div>

</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#event">
  Launch
</button>

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
                <form id="formEvent" action="{{route('admin.events.store')}}">
                    @csrf

                    <input type="hidden" name="id" id="eventId"> <!-- ID oculto para edición -->

                    {{-- <div class="form-group">
                      <label for="title">Producto</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Comprar Producto">
                    </div> --}}



                    <div class="form-group">
                        <label for="units">Unidades</label>
                        <input type="number"
                            class="form-control form-control-sm" name="units" id="units" aria-describedby="helpId" placeholder="Unidades">
                      </div>

                    <div class="form-group">
                        <label for="unit_price">Precio</label>
                        <input type="number"
                            class="form-control form-control-sm" name="unit_price" id="unit_price" aria-describedby="helpId" placeholder="Precio precio">
                      </div>

                      <div class="form-group">
                        <label for="start_date">Fecha Inicio</label>
                        <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                      </div>
                      
                      <div class="form-group">
                        <label for="end_date">Fecha Fin</label>
                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      </div>
                </form>


            </div>

    

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSave">Guardar</button>
                <button type="button" class="btn btn-warning" id="btnEdit">Modificar</button>
                <button type="button" class="btn btn-danger" id="btnDestroy">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>



@stop


@section('js')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {

    var events = @json($events );
    
    console.log(events);

    let formulario = document.getElementById("formEvent");

    let calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        locale:'es',

        headerToolbar: {
        start: 'prev,next today', 
        center: 'title',
        end: 'dayGridMonth, timeGridWeek, listWeek'
        },

        selectable: true,
        editable: true,

        events: events, //Ruta para cargar eventos

        dateClick:function(info){
                formulario.reset(); // Limpiar el formulario
                // document.getElementById("eventId").value = ''; // Vaciar ID de evento
                // document.getElementById("start").value = info.dateStr; // Fecha seleccionada
                // document.getElementById("end").value = info.dateStr; // Fecha por defecto
                $("#event").modal("show"); // Mostrar modal
        }

    });
    calendar.render();

    document.getElementById("btnSave").addEventListener("click",function(){
            const data = new FormData(formulario);
            fetch("{{route('admin.events.store')}}",{
                method: "POST",
                body: data,
                headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data=> {
                if(data.success){
                    calendar.refetchEvents();  //Recargar eventos en el calendario
                    $('#event').modal("hide"); //Ocultar el modal
                    alert("Evento guardado exitosamente!");
                }else {
                alert("Hubo un error al guardar el evento.");
            }
            })
            .catch(error => {
            console.error("Error:", error);
            alert("Ocurrió un error al guardar el evento.");
            });
        });
    });

</script>

@stop

