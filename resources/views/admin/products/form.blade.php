
        
        <div class="col-md-6">
            <label for="name">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" value="{{ old('name',@$product->name) }}" id="name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="description">Description</label>
            <input class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description" type="text" value="{{ old('description',@$product->description) }}" id="description">
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="image">Image</label>
            <input class="form-control @error('image') is-invalid @enderror" placeholder="Image" name="image" type="file" value="{{ old('image',@$product->image) }}" id="image">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    <div class="col-md-6">
        <label for="category_id">Category</label>
        
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="">Select Category</option>
            @foreach($categories as $relatedItem)
                <option value="{{ $relatedItem->id }}" {{ old('category_id', @$product->category_id) == $relatedItem->id ? 'selected' : '' }}>
                    {{ $relatedItem->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
