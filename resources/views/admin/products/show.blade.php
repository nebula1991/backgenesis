@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Producto</h1>
@stop

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

                            <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.products.index') }}"> Back </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col-md-8">
                            <strong>Nombre:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="col-md-8">
                            <strong>Descripcion:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="col-md-6">
                            <strong>Categoria:</strong>
                            {{ $product->category_id }}
                        </div>
                        <div class="col-md-6">
                            <strong>Subcategoria:</strong>
                                @if($product->subcategory)
                                    {{ $product->subcategory->name }} <!-- Nombre de la subcategoría -->
                                @else
                                    No tiene subcategoría
                                @endif
                          
                        </div>
                        <div class="col-md-8">
                            <strong>Imagen:</strong>
                            @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="Imagen del Producto" width="50">
                            @else
                                No hay imagen
                            @endif
                        </div>
                        
                        {{-- Mostrar las temporadas --}}
                            @foreach($product->rateProducts as $rateProduct )
                            <div>
                                <strong>Temporada: </strong>
                                    {{$rateProduct->name}}
                                <strong>Precio: </strong>
                                    {{$rateProduct->price_rate}}   
                                <strong>Fecha Inicio: </strong>
                                    {{$rateProduct->start_date}}   
                                <strong>Fecha Fin: </strong>
                                    {{$rateProduct->end_date}}   
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
