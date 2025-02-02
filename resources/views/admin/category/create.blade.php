@extends('adminlte::page')

@section('title', '')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Categorias</h1>
    </div>
</div>
@stop

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
          
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                       Crear Categoria
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.category.store')}}"    class="row g-3">
                            @csrf

                            @include('admin.category.form')

                        </form>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
