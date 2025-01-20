<div class="col-md-6">
    <label for="name">Categoria</label>
    <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" value="{{ old('name',@$category->name) }}" id="name">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label for="description">Descripción</label>
    <input class="form-control @error('description') is-invalid @enderror" placeholder="Descripcion" name="description" type="text" value="{{ old('description',@$category->description) }}" id="description">
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12 mt-2">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>