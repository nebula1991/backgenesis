@extends('adminlte::page')

@section('title', 'BackGenesis')


@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>Administrador</h1>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid py-4">
    <div class="row mx-md-5">
        <div class="col-12">
        
        

        <div class="row">

            <div class="col-lg-4 col-6">
                <div class="small-box bg-success text-center">
                    <div class="inner">
                        <h5>
                            Total de Categorias: {{ \App\Models\Category::count() }}
                        </h5>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{route('admin.category.index')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info text-center">
                    <div class="inner">
                        <h5>
                        Total de Subcategorias: {{ \App\Models\Subcategory::count() }}
                        </h5>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{route('admin.subcategory.index')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning text-center">
                    <div class="inner">
                        <h5>
                            Total de productos: {{ \App\Models\Product::count() }}
                        </h5>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{route('admin.products.index')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

  
        </div>

    </div>
    </div>
</div>


@stop





