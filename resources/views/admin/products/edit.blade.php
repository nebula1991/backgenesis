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
                        Actualizar Producto
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.products.form')
                            <h5>Temporadas</h5>
                           
                            @include('admin.products.form_rates')
                      
                    
                            
                            
                            <div class="col-md-4 mt-2">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                    

                        </form>

                   
                    
                
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

