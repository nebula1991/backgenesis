@extends('adminlte::page')

@section('title', '')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Actualizar Producto</h1>
    </div>
</div>
@stop


@section('content')
    <section class=" container-fluid py-4">
        <div class="row mx-md-5">
        
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.category.index') }}"> Atras </a>
             
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.update', $product->id) }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            {{ method_field('PATCH') }}
                            @csrf


                         
                                @include('admin.products.form')

                                <div class="container">
                                    <h5>Temporadas</h5>
                            
                        
                                    @include('admin.products.form_rates')
    
                            
                         
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
                              
                        
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

