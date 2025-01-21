@extends('adminlte::page')

@section('title', 'Subcategorías')

@section('content_header')
    {{-- <h1>Subcategorías de {{ $category->name }}</h1> --}}
@stop

@section('content')
    <div class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Categorías</a></li>
                        <li class="breadcrumb-item active" aria-current="{{route('admin.subcategory.index')}}">Subcategorías</li>
                    </ol>
                </nav>
            </div>

            {{-- <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary float-end btn-sm"><i class="fa fa-solid fa-plus"></i> Crear Subcategoría</a>
                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="#" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-secondary btn-sm">Buscar</button>
                                    </div>
                                </form>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subcategories as $subcategory)
                                                <tr>
                                                    <td>{{ $subcategory->id }}</td>
                                                    <td>{{ $subcategory->name }}</td>
                                                    <td>{{ $subcategory->description }}</td>
                                                    <td>
                                                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-primary" href="{{ route('subcategories.edit', $subcategory->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $subcategories->appends(request()->query())->links() !!}
            </div>
        </div> --}}
    </div>
@stop
