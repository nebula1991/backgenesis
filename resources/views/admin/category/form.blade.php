    <div class="col-md-6">
        <label for="name">Categoria</label>
        <input class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" type="text" value="{{ old('name',@$category->name) }}" id="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-md-6">
        <label for="description">Descripción</label>
        <input class="form-control @error('description') is-invalid @enderror" placeholder="Descripción" name="description" type="text" value="{{ old('description',@$category->description) }}" id="description">
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

     

