@extends('adminlte::page')

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
         
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.subcategory.index') }}"> Back </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col-md-6">
                            <strong>Nombre:</strong>
                            {{ $subcategory->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Descripcion:</strong>
                            {{ $subcategory->description }}
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Categoría Asociada:</strong></label>
                            {{ $subcategory->categories->name }} <!-- Aquí obtenemos el nombre de la categoría asociada -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
