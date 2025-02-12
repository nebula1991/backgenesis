@extends('adminlte::page')

@section('title')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Proveedores</h1>
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
                            <button type="button" class="btn btn-sm btn-outline-primary text-uppercase" data-toggle="modal"
                                data-target="#crearCategoria">
                                <i class="fa fa-solid fa-plus"></i> Nuevo proveedor
                            </button>
                            @endrole


                            <a href="{{route('admin.suppliers.pdf')}}" class="btn btn-outline-danger btn-sm"
                                target="_blank">
                                PDF</a>
                            <!-- Modal Crear Categorias -->
                            <div class="modal fade" id="crearCategoria" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registrar Proveedor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{route('admin.suppliers.store')}}"
                                                class="row g-3">
                                                @csrf
                                                
                                                <div class="col-md-6">
                                                    <label for="name">Proveedor</label>
                                                    <input class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" type="text" value="{{ old('name',@$supplier->name) }}" id="name">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            
                                            
                                                <div class="col-md-6">
                                                    <label for="email">Email</label>
                                                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" type="email" value="{{ old('email',@$category->email) }}" id="email">
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="address">Dirección</label>
                                                    <input class="form-control @error('address') is-invalid @enderror" placeholder="Dirección" name="address" type="text" value="{{ old('address',@$category->address) }}" id="address">
                                                    @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone">Telefono</label>
                                                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Teléfono" name="phone" type="text" value="{{ old('phone',@$category->phone) }}" id="phone">
                                                    @error('phone')
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
                            <form action="{{ route('admin.suppliers.index') }}" method="GET" class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        placeholder="Search" value="{{ request('search') }}">
                                </div>
                                <div class="col-md-3">

                                    <a href="{{ route('admin.suppliers.index') }}"><button type="submit"
                                            class="btn btn-secondary btn-sm">Buscar</button></a>
                                </div>
                            </form>
                            @if($suppliers->isEmpty())
                            <div
                                class="col-md-12 mt-2  text-uppercase text-center font-weight-bold alert alert-warning">
                                <p>No hay proveedores disponibles.</p>
                            </div>
                            @else
                            <div class="table-responsive col-12 mt-3">
                                <table class="table table-striped table-hover text-uppercase">
                                    <thead class="thead text-center thead-dark">
                                        <tr>
                                            <th>Num</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier->id }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->address }}</td>
                                            <td>{{ $supplier->phone }}</td>
                                            <td style="width: 150px;">
                                                <div class="d-flex">
                                                    <form action="{{ route('admin.suppliers.destroy',$supplier->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('admin.suppliers.show',$supplier->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> </a>
                                                        <a class="btn btn-warning btn-sm"
                                                            href="{{ route('admin.suppliers.edit',$supplier->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        @role('admin')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> </button>
                                                        @endrole
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
        {{$suppliers->links('pagination::bootstrap-4')}}
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