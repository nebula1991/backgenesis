@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Administrador</h1>
    
@stop

@section('content')
<div class="container-fluid py-4">
    <div class="row mx-md-5">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="categories"><a href="{{route('admin.category.index')}}">Categorias</a></li>
                        <li class="breadcrumb-item active" aria-current="subcategories"><a href="{{route('admin.subcategory.index')}}">Subcategorias</a></li>
                        <li class="breadcrumb-item active" aria-current="products"><a href="{{route('admin.products.index')}}">Productos</a></li>
                    </ol>
                </nav>
            </nav>
        </div>
    </div>
</div>
@stop


