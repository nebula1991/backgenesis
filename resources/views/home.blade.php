@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Administrador</h1>
    
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <a href="{{route('admin.category.index')}}">crud categorias</a>
    <br>
    <a href="{{route('admin.products.index')}}">crud productos</a>
@stop


