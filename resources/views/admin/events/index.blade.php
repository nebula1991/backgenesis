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
                          class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Titulo del evento">
                      </div>

                    <div class="form-group">
                    <label for="product">Producto</label>
                    <select name="product_id" id="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} | {{ $product->description }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="units">units</label>
                      <input type="number"
                        class="form-control" name="units" id="units" min="1" required placeholder="unidades">
                    </div>
       

                      <div class="form-group">
                        <label for="start">Fecha Inicio</label>
                        <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="startTime">Hora Inicio</label>
                        <input type="time" class="form-control" name="startTime" id="startTime" aria-describedby="helpId" placeholder="">
                      </div>
                      
                      <div class="form-group">
                        <label for="end">Fecha Fin</label>
                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="endTime">Hora Fin</label>
                        <input type="time" class="form-control" name="endTime" id="endTime" aria-describedby="helpId" placeholder="">
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

    document.addEventListener('DOMContentLoaded', async function() {


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
            console.log("ID del producto:",info.event.extendedProps.product_id);
            console.log(info.event.units);
            console.log(info.event.start);
            console.log(info.event.end);
            console.log(info.event.extendedProps.units);
            

            // Guardar el ID en el campo oculto
            $('#eventId').val(info.event.id);

            $('#title').val(info.event.title);
            $('#product_id').val(info.event.extendedProps.product_id);
            $('#units').val(info.event.extendedProps.units);

            
            // Obtener la fecha en formato local (sin ajustes de zona horaria)
            let startDate = info.event.start ? info.event.start.toLocaleDateString('en-CA') : ""; // Formato YYYY-MM-DD
            let endDate = info.event.end ? info.event.end.toLocaleDateString('en-CA') : startDate;

            $('#start').val(startDate);
            $('#end').val(endDate);
            
            let startTime = info.event.start ? info.event.start.toLocaleTimeString('en-US', {hour12:false}) : null; // Formato HH:MM:SS
            let endTime = info.event.end ? info.event.end.toLocaleTimeString('en-US', {hour12:false}) : null;

            $('#startTime').val(startTime ? startTime.slice(0,5) : '');
            $('#endTime').val(endTime ? endTime.slice(0,5) : '');

            $('#btnSave').hide(); // Ocultar botón de guardar
            $('#btnEdit, #btnDestroy').show(); // Mostrar botones de modificar y eliminar
            $("#event").modal("show"); // Mostrar modal
        },
     
        events: "{{ url('admin/events/show') }}",
    });
    calendar.render();

    $('#btnSave').click(async () => {

        let ObjEvento = await recolectarDatosGUI("POST");
        console.log("Creando evento:", ObjEvento);
        Enviarinformacion('',ObjEvento);
  

    });

    $('#btnEdit').click(async () => {
        let idEvento = $('#eventId').val(); 
        let ObjEvento = await recolectarDatosGUI("PATCH");
        console.log("Actualizando evento con ID:", idEvento);
        Enviarinformacion(idEvento,ObjEvento);
    

    });

    $('#btnDestroy').click(async () =>{
        
        let ObjEvento =  await recolectarDatosGUI("DELETE");

        Enviarinformacion('/'+$('#eventId').val(),ObjEvento);


    });



    async function recolectarDatosGUI(method){

        let units = $('#units').val();
        let productId = $('#product_id').val();
        let price = 0;
        let startDate = $('#start').val();
        let endDate = $('#end').val();

        if(units && productId && startDate){
        try{
            const response = await $.ajax({
                url: "{{ url('admin/events/precio') }}/"+productId + "?units=" + units + "&date=" + startDate,
                type: 'GET',
            });

            price = response.price;
            console.log('Precio total:', price);
        } catch (error){
                // async: false,
                // success: function(response){
                //     price = response.price;
                //     console.log('Precio total:', price);
                // },
                
                    console.error("Error al obtener el precio del producto:", error);
                    alert("Hubo un error al obtener el precio del producto.");
                    price = 0;   
            }
        }


        newEvent = {
            id: $('#eventId').val(),
            title: $('#title').val(),
            product_id: productId,
            units: units,
            price: price,
            start: startDate,
            end: endDate,
            startTime: $('#startTime').val(),
            endTime: $('#endTime').val(),
            '_token': $("meta[name='csrf-token']").attr("content"),
            'method': method,
        }
        console.log("Datos del evento:", newEvent);
        return(newEvent);
    }


        function Enviarinformacion(accion,ObjEvento){
            let urlBase = "{{url('admin/events')}}";
            let urlFinal = accion ? `${urlBase}/${accion.replace(/^\/+/, '')}` : urlBase;
            let method = ObjEvento.method; // Usar el método definido en recolectarDatosGUI
            
            console.log("Enviando a:", urlFinal, "Método:", method,  "Datos:", ObjEvento);

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
                    console.error("Error:", status, error);
                    console.log("Respuesta del servidor:", xhr.responseText);  // Log server response
                    alert("Hubo un error al procesar la solicitud.");
                }

            }
        );
    }

});



</script>

@stop

