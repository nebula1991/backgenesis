    <div class="col-md-6">
        <label for="name">Subcategoria</label>
        <input class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" type="text" value="{{ old('name',@$subcategory->name) }}" id="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-md-6">
        <label for="description">Descripción</label>
        <input class="form-control @error('description') is-invalid @enderror" placeholder="Descripcion" name="description" type="text" value="{{ old('description',@$subcategory->description) }}" id="description">
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

        <!-- Seleccionar Categoría -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{$category->id}}"  {{ old('category_id',@$subcategory->category_id) == $category->id ? 'selected' : '' }} id="name">
                {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>




