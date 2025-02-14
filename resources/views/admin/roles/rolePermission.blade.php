@extends('adminlte::page')

@section('title')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Roles y Permisos</h1>
    </div>
</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.roles.index') }}"> Atras </a>
    </div>


    <div class="card-body">
     
        {!!Form::model($role,['route' => ['admin.roles.update', $role],'method' => 'put']) !!}

        <div class="col-md-12">
            <div class="col-md-6">
                <label for="name">Nombre del Rol</label>
                <input class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre del rol" name="name" type="text"
                    value="{{ old('name', @$role->name) }}" id="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
    
            </div>
        </div>
    
        <div class="col-md-12 mt-2">

        <hr>
        <h5>Lista de Permisos</h5>

            @foreach($permissions as $permission)
            <div class="icheck-success">
                {!! Form::checkbox('permissions[]', $permission->id, $role->hasPermissionTo($permission), ['id' => 'perm_'.$permission->id]) !!}
                <label for="perm_{{$permission->id}}">
                    {{$permission->name}}
                </label>
            </div>
            @endforeach
            {!! Form::submit('Guardar', ['class' => 'btn btn-success mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop