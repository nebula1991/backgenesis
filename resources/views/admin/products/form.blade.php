<div class="col-md-6">
    <label for="name">Nombre</label>
    <input class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" type="text"
        value="{{ old('name',@$product->name) }}" id="name">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="description">Descripción</label>
    <input class="form-control @error('description') is-invalid @enderror" placeholder="Descripcion" name="description"
        type="text" value="{{ old('description',@$product->description) }}" id="description">
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="price">Precio</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Precio" name="price"
        step="0.01" min="0" value="{{ old('price',@$product->price) }}" id="price">
    @error('price')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="stock">Stock</label>
    <input type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="Stock" name="stock"
        min="0" min="0" value="{{ old('stock',@$product->stock) }}" id="stock">
    @error('stock')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="image">Imagen</label>
    <input class="form-control-file @error('image') is-invalid @enderror" placeholder="Image" name="image" type="file"
        value="{{ old('image',@$product->image) }}" id="image" accept=".jpg, .jpeg, .png">
    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="category_id" class="form-label">Categoria</label>

    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        <option value="">Seleccionar Categoria</option>
        @foreach($categories as $relatedItem)
        <option value="{{ $relatedItem->id }}" {{ old('category_id', @$product->category_id) == $relatedItem->id ?
            'selected' : '' }}>
            {{ $relatedItem->name }}
        </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6 mb-3">
    <label for="subcategory_id" class="form-label">Subcategoría</label>
    <select name="subcategory_id" id="subcategory_id" class="form-control">
        <option value="">Selecciona una subcategoría</option>
        @foreach($subcategories as $subcategory)
        <option value="{{ $subcategory->id }}" {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ?
            'selected' : '' }}>
            {{ $subcategory->name }}
        </option>
        @endforeach
    </select>
</div>