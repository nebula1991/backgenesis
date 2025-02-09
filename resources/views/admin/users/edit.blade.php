@extends('adminlte::page')

@section('title')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Usuarios y Roles</h1>
    </div>
</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">
       <p>{{$user->name}}</p> 
    </div>
    <div class="card-body">
       <h5>Lista de Permisos</h5>
       {!!Form::model($user,['route' => ['admin.users.update', $user],'method' => 'put']) !!}

         @foreach($roles as $role)
            <div class="form-check">
                <label for="">
                    {!! Form::checkbox('roles[]', $role->id, $user->hasAnyRole($role->id) ? : false, ['class' => 'form-check-input']) !!}
                    {{$role->name}}
                </label>
            </div>
            @endforeach
            {!! Form::submit('Asignar Roles', ['class' => 'btn btn-primary mt-2']) !!}
       {!! Form::close() !!}
    </div>
</div>

@stop