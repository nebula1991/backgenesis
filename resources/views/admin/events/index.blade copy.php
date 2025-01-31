// document.getElementById("btnSave").addEventListener("click",function(){
    //         const data = new FormData(formulario);
    //         fetch("{{route('admin.events.store')}}",{
    //             method: "POST",
    //             headers: {
    //                 'X-CSRF-TOKEN': "{{ csrf_token() }}",
    //                   "X-Requested-With": "XMLHttpRequest"
    //             }
    //         })
    //         .then(response => response.json())
    //         .then(data=> {
    //             if(data.success){
    //                 calendar.refetchEvents();  //Recargar eventos en el calendario
    //                 $('#event').modal("hide"); //Ocultar el modal
    //                 alert("Evento guardado exitosamente!");
    //             }else {
    //             alert("Hubo un error al guardar el evento.");
    //         }
    //         })
    //         .catch(error => {
    //         console.error("Error:", error);
    //         alert("Ocurrió un error al guardar el evento.");
    //         });
    //     });
    // 