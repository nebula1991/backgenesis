@extends('adminlte::page')

@section('title')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Categorias</h1>
    </div>
</div>
   

        @if(session('success'))
        <div class="alert alert-success mt-2">
            {{session('success')}}
        </div>
        @endif
        @if(session('destroy'))
        <div class="alert alert-danger mt-2">
            {{session('destroy')}}
        </div>
        @endif
@stop

@section('content')
    <div class="container-fluid py-4">
        <div class="row mx-md-5">
         

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-outline-info text-uppercase float-end btn-sm "><i class="fa fa-solid fa-plus"></i> Nueva categoria</a>
                                <a href="{{route('admin.category.pdf')}}" class="btn btn-outline-danger btn-sm" target="_blank" > PDF</a>
                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="{{ route('categories.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                       
                                        <a href="{{ route('categories.index') }}"><button type="submit" class="btn btn-secondary btn-sm">Buscar</button></a>
                                    </div>
                                </form>
                                @if($categories->isEmpty())
                                    <div class="col-md-12 mt-2  text-uppercase text-center font-weight-bold alert alert-warning">
                                        <p>No hay categorías disponibles.</p>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead class="thead">
                                                <tr>
                                                    <th>Num</th>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>{{ $category->description }}</td>
                                                        <td>
                                                                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                                                                <a class="btn btn-warning btn-sm" href="{{ route('categories.edit',$category->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                                
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{$categories->links('pagination::bootstrap-4')}}
        </div>
    </div>
@stop
