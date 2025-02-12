@extends('adminlte::page')

@section('title', '')

@section('content_header')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Editar Subcategorias</h1>
    </div>
</div>
    
@stop

@section('content')
    <section class=" container-fluid py-4">
        <div class="row mx-md-5">
     
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Actualizar Categoria
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.subcategory.update', $subcategory->id) }}" class="row g-3" novalidate>
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.subcategory.form')

                            <div class="col-md-6 mt-2 d-flex float-end">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
