@extends('adminlte::page')

@section('title', '')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Crear Producto</h1>
    </div>
</div>
@stop

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
       
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                       Crear Producto
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.store') }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            @csrf

                            @include('admin.products.form')

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
