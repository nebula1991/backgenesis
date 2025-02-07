@extends('adminlte::page')

@section('title')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Administración de Permisos</h1>
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

                            <button type="button" class="btn btn-outline-primary text-uppercase" data-toggle="modal"
                                data-target="#crearPermiso">
                                <i class="fa fa-solid fa-key"></i> Nuevo Permiso
                            </button>


                            <!-- Modal Crear Permisos -->
                            <div class="modal fade" id="crearPermiso" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Crear Permiso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="#" class="row g-3">
                                                @csrf
                                                <div class="col-md-6">
                                                    <label for="name">Permiso</label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Nombre del permiso" name="name" type="text"
                                                        value="{{ old('name') }}" id="name">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="{{ route('admin.permissions.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm"
                                            placeholder="Search" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">

                                        <a href="{{ route('admin.permissions.index') }}"><button type="submit"
                                                class="btn btn-secondary btn-sm">Buscar</button></a>
                                    </div>
                                </form>

                                <div class="table-responsive col-12 mt-3">
                                    <table class="table table-striped table-hover text-uppercase">
                                        <thead class="thead text-center thead-dark">
                                            <tr>
                                                <th>Num</th>
                                                <th>Nombre</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->id }}</td>
                                                <td>{{ $permission->name }}</td>
                                                
                                                <td style="width: 150px;">
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-warning btn-sm mr-2"
                                                            href="#"><i
                                                                class="fa fa-fw fa-edit"></i> </a>
                                                        <form action="#"
                                                            method="POST" class="formEliminar">

                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i> </button>
                                                        </form>
                                                    </div>
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
            </div>
            {{-- {{$users->links('pagination::bootstrap-4')}} --}}
        </div>

        @stop

        @section('js')
        <script>
            $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Estas seguro?",
                    text: "Vas a eliminar un usuario",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar"
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    } 
                });
            });
        });
        </script>

        @stop