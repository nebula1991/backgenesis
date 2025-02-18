@extends('adminlte::page')

@section('title', 'BackGenesis')


@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Dashboard</h1>
    </div>
</div>

@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

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
                            Total Categorias: {{ \App\Models\Category::count() }}
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
                        Total Subcategorias: {{ \App\Models\Subcategory::count() }}
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
                            Total productos: {{ \App\Models\Product::count() }}
                        </h5>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{route('admin.products.index')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

  

            <div class="col-lg-4 col-6">
                <div class="small-box bg-secondary text-center">
                    <div class="inner mt-4">
                        <div class="icon">
                            <i class="fas fa-truck "></i>
                        </div>
                
                        <h5>
                            Distribuidores
                        </h5>
                        <h3>{{ \App\Models\Supplier::count() }} </h3>
                   
                    </div>
         

                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-dark text-center">
                    <div class="inner mt-4">
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                
                        <h5>
                            Usuarios registrados: 
                        </h5>
                        <h3>{{ \App\Models\User::count() }} </h3>
                   
                    </div>
         
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-red text-center">
                    <div class="inner mt-4">
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                
                        <h5>
                            Total pedidos: 
                        </h5>
                        <h3>{{ \App\Models\Order::count() }} </h3>
                   
                    </div>
         
                </div>
            </div>


       
  
        </div>
        <h1>{{ $chart->options['chart_title'] }}</h1>
        {!! $chart->renderHtml() !!}
    </div>
    </div>
</div>


@stop

@section('js')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@stop



