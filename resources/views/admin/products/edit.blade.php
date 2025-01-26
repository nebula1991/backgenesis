@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Actualizar Producto</h1>
@stop


@section('content')
    <section class=" container-fluid py-4">
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
                        Actualizar Producto
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.products.form')
                            <h5>Temporadas</h5>
                           
                            @include('admin.products.form_rates')
                      
                    
                            
                            
                            <div class="col-md-4 mt-2">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                    

                        </form>

                   
                    
                
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

