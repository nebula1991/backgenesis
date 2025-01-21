@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Crear Productos</h1>
@stop

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categorias</a></li>
                        <li class="breadcrumb-item active" aria-current="create">Añadir Producto</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                       Crear Producto
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.store') }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            @csrf

                            @include('admin.products.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
