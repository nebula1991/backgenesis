@extends('adminlte::page')

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.category.index') }}"> Atras </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col-md-6">
                            <strong>Nombre:</strong>
                            {{ $category->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Descripcion:</strong>
                            {{ $category->description }}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
