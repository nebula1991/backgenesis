@extends('adminlte::page')

@section('title')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Editar Permiso</h1>
    </div>
</div>

@stop

@section('content')
<section class=" container-fluid py-4">
    <div class="row mx-md-5">
    
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                        <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.permissions.index') }}"> Atras </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}" class="row g-3">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="col-md-6">
                            <label for="name">Permiso</label>
                            <input class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nombre del permiso" name="name" type="text"
                                value="{{ old('name', @$permission->name) }}" id="name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>


                </div>

          
            </div>
        </div>
    </div>
</section>
@stop