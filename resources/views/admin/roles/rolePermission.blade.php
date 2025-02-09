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
       <p>{{$role->name}}</p> 
    </div>
    <div class="card-body">
       <h5>Lista de Permisos</h5>
       {!!Form::model($role,['route' => ['admin.roles.update', $role],'method' => 'put']) !!}

         @foreach($permissions as $permission)
            <div class="form-check">
                <label for="">
                    {!! Form::checkbox('permissions[]', $permission->id, $role->hasPermissionTo($permission->id) ? : false, ['class' => 'form-check-input']) !!}
                    {{$permission->name}}
                </label>
            </div>
            @endforeach
            {!! Form::submit('Asignar Permisos', ['class' => 'btn btn-primary mt-2']) !!}
       {!! Form::close() !!}
    </div>
</div>

@stop