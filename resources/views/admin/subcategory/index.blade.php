@extends('adminlte::page')

@section('title', '')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Subcategorias</h1>
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
                                @role('admin')
                                    <button type="button" class="btn btn-outline-primary text-uppercase" data-toggle="modal" data-target="#crearSubcategoria">
                                        <i class="fa fa-solid fa-plus"></i> Nueva subcategoria
                                    </button>
                                @endrole
                                  {{-- Modal subcategorias --}}
                                  <div class="modal fade" id="crearSubcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Subcategoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{route('admin.subcategory.store')}}"    class="row g-3">
                                                @csrf
                                                @include('admin.subcategory.form')
                                                
                                                </div>
                                                <div class="modal-footer">
                                            
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                                
                                        </form>
                                    </div>
                                    </div>
                                </div>
                           
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
                                @if($subcategories->isEmpty())
                                    <div class="col-md-12 mt-2  text-uppercase text-center font-weight-bold alert alert-warning">
                                        <p>No hay subcategorías disponibles.</p>
                                    </div>
                                @else

                             
                                <div class="table-responsive col-12 mt-3">
                                    <table class="table table-striped table-hover text-uppercase">
                                        <thead class="thead text-center thead-dark">
                                            <tr>
                                                <th>Num</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Categoria Asociada</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                     
                                            @foreach ($subcategories as $subcategory)
                                                <tr>
                                                    <td>{{ $subcategory->id }}</td>
                                                    <td>{{ $subcategory->name }}</td>
                                                    <td>{{ $subcategory->description }}</td>
                                                    <td>{{ $subcategory->categories->name }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.subcategory.destroy', $subcategory->id) }}" method="POST">
                                                            <a class="btn btn-info btn-sm" href="{{ route('admin.subcategory.show',$subcategory->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                            <a class="btn btn-sm btn-warning" href="{{ route('admin.subcategory.edit', $subcategory->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                            @csrf
                                                            @method('DELETE')

                                                           @role('admin') 
                                                             <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                            @endrole
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
            {{$subcategories->links('pagination::bootstrap-4')}}
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
