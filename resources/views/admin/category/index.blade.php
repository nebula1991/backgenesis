@extends('adminlte::page')

@section('title')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Categorias</h1>
    </div>
</div>
   
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
                              
                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="{{ route('admin.category.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                       
                                        <a href="{{ route('admin.category.index') }}"><button type="submit" class="btn btn-secondary btn-sm">Buscar</button></a>
                                    </div>
                                </form>
                                @if($categories->isEmpty())
                                    <div class="col-md-12 mt-2  text-uppercase text-center font-weight-bold alert alert-warning">
                                        <p>No hay categorías disponibles.</p>
                                    </div>
                                @else
                                    <div class="table-responsive col-12 mt-3">
                                        <table class="table table-striped table-hover text-uppercase">
                                            <thead class="thead text-center thead-dark">
                                                <tr>
                                                    <th>Num</th>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>{{ $category->description }}</td>
                                                        <td style="width: 150px;">
                                                            <div class="d-flex">
                                                                <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
                                                                <a class="btn btn-info btn-sm" href="{{ route('admin.category.show',$category->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                                <a class="btn btn-warning btn-sm" href="{{ route('admin.category.edit',$category->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                                </form>
                                                            </div>
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

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
@stop
