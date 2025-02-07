<div class="temporadas col-md-12">
    @if ($product->rateProducts->isNotEmpty())
    <!-- Mostrar la primera temporada existente -->
    @foreach ($product->rateProducts as $index => $rateProduct)
    <div class="temporada" data-season-id="{{ $rateProduct->id }}">
        <input type="hidden" name="season_ids[{{ $index }}]" value="{{ $rateProduct->id }}">

        <div class="col-md-6">
            <label for="season">Temporada</label>
            <input class="form-control @error('season.' . $index) is-invalid @enderror" placeholder="Nombre Temporada"
                name="season[{{ $index }}]" type="text" value="{{ old('season.' . $index, $rateProduct->name) }}"
                id="season">
            @error('season.' . $index)
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="price_rate">Precio</label>
            <input class="form-control @error('price_rate.' . $index) is-invalid @enderror" placeholder="Precio"
                name="price_rate[{{ $index }}]" type="number" step="0.01" min="0"
                value="{{ old('price_rate.' . $index, $rateProduct->price_rate) }}" id="price_rate">
            @error('price_rate.' . $index)
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="start_date">Fecha de Inicio</label>
            <input class="form-control @error('start_date.' . $index) is-invalid @enderror" placeholder="Fecha Inicial"
                name="start_date[{{ $index }}]" type="date"
                value="{{ old('start_date.' . $index, $rateProduct->start_date) }}" id="start_date">
            @error('start_date.' . $index)
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="end_date">Fecha Final</label>
            <input class="form-control @error('end_date.' . $index) is-invalid @enderror" placeholder="Fecha Final"
                name="end_date[{{ $index }}]" type="date"
                value="{{ old('end_date.' . $index, $rateProduct->end_date) }}" id="end_date">
            @error('end_date.' . $index)
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <div class="d-flex justify-content-end mt-2">
                <button type="button" class="btn btn-danger" onclick="eliminar(this)">Eliminar</button>
            </div>
        </div>
      
    </div>
    @endforeach
    @else
    <!-- Mostrar un formulario vacío si no hay temporadas existentes -->
    <div class="temporada">
        <input type="hidden" name="season_ids[0]" value="">

        <div class="col-md-6">
            <label for="season_0">Temporada</label>
            <input type="text" class="form-control" name="season[0]" placeholder="Nueva Temporada">
        </div>

        <div class="col-md-6">
            <label for="price_rate_0">Precio</label>
            <input type="number" class="form-control" name="price_rate[0]" placeholder="Nuevo Precio" step="0.01"
                min="0">
        </div>

        <div class="col-md-6">
            <label for="start_date_0">Fecha de Inicio</label>
            <input type="date" class="form-control" name="start_date[0]" placeholder="Nueva Fecha de Inicio">
        </div>

        <div class="col-md-6">
            <label for="end_date_0">Fecha Final</label>
            <input type="date" class="form-control" name="end_date[0]" placeholder="Nueva Fecha Final">
        </div>

        <div class="d-flex justify-content-end mt-2">
                <button type="button" class="btn btn-danger" onclick="eliminar(this)">Eliminar</button>
        </div>
     
    </div>
    @endif
</div>

<!-- Contenedor para formularios clonados -->
<div class="col-md-12" id="formContainer"></div>


<!-- Botón para agregar más temporadas -->
<div class="row">
    <div class="col-2 mt-2">
        <button type="button" class="btn btn-warning" onclick="clonar()">Crear</button>
    </div>
</div>
<!-- Campo oculto para almacenar los IDs de las temporadas eliminadas -->
<input type="hidden" name="deleted_seasons" id="deletedSeasons" value="">

<script>
    let seasonIndex = {{ $product->rateProducts->count() }}; // Índice inicial basado en las temporadas existentes

   function clonar() {
    // Seleccionar la última temporada en el DOM
    const temporadaOriginal = document.querySelector('.temporada:last-of-type');

    if (temporadaOriginal) {
        // Clonar la temporada
        const temporadaClonada = temporadaOriginal.cloneNode(true);

        // Limpiar los valores de los campos clonados
        const inputs = temporadaClonada.querySelectorAll('input');
        inputs.forEach(input => {
            if (input.type !== 'hidden') {
                input.value = ''; // Limpiar el valor del campo
            }

            // Actualizar el atributo name para que tenga el índice dinámico
            const name = input.getAttribute('name');
            if (name) {
                const newName = name.replace(/\[\d+\]/, `[${seasonIndex}]`);
                input.setAttribute('name', newName);
            }
        });

        // Incrementar el índice para la siguiente temporada
        seasonIndex++;

        // Agregar el formulario clonado al contenedor
        const container = document.getElementById('formContainer');
        if (container) {
            container.appendChild(temporadaClonada);
        }
    } else {
        console.error('No se encontró el formulario original para clonar.');
    }
}

function eliminar(boton) {
    // Obtener el formulario padre del botón
    const formulario = boton.closest('.temporada');

    if (formulario) {
        // Verificar si el formulario tiene un ID de temporada (para temporadas existentes)
        const seasonId = formulario.getAttribute('data-season-id');

        if (seasonId) {
            // Si es una temporada existente, agregar el ID al campo hidden "deleted_seasons"
            const deletedSeasonsField = document.getElementById('deletedSeasons');
            if (deletedSeasonsField) {
                let deletedSeasons = deletedSeasonsField.value ? JSON.parse(deletedSeasonsField.value) : [];
                deletedSeasons.push(seasonId);
                deletedSeasonsField.value = JSON.stringify(deletedSeasons);
            }
        }

        // Eliminar el formulario del DOM
        formulario.remove();
    } else {
        console.error('No se encontró el formulario asociado al botón de eliminar.');
    }
}


</script>