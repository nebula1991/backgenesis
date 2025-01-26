@extends('layouts.app')

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="categories"><a href="{{route('admin.category.index')}}">Categorias</a></li>
                        <li class="breadcrumb-item active" aria-current="subcategories"><a href="{{route('admin.subcategory.index')}}">Subcategorias</a></li>
                        <li class="breadcrumb-item active" aria-current="products"><a href="{{route('admin.products.index')}}">Productos</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Subcategoria
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.subcategory.index') }}"> Back </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col-md-6">
                            <strong>Nombre:</strong>
                            {{ $subcategory->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Descripcion:</strong>
                            {{ $subcategory->description }}
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Categoría:</strong></label>
                            <p>{{ $subcategory->category->name }}</p> <!-- Aquí obtenemos el nombre de la categoría asociada -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
