@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Producto</h1>
    </div>
</div>
@stop

@section('content')
<section class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.products.index') }}"> Back </a>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <strong>Nombre:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Descripcion:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="col-md-6">
                            <strong>Categoria:</strong>
                            {{ $product->category->name }}
                            <strong>Subcategoria:</strong>
                            @if($product->subcategory)
                            {{ $product->subcategory->name }}
                            <!-- Nombre de la subcategoría -->
                            @else
                            No tiene subcategoría
                            @endif
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <strong>Imagen:</strong>
                                @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="Imagen del Producto" width="150">
                                @else
                                No hay imagen
                                @endif
                            </div>

                        </div>



                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h3>Temporadas y Precios</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Temporada</th>
                                            <th>Precio</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($product->rateProducts as $rateProduct )
                                        <tr>
                                            <td>{{$rateProduct->name}}</td>
                                            <td>{{$rateProduct->price_rate}} </td>
                                            <td>{{$rateProduct->start_date}}</td>
                                            <td>{{$rateProduct->end_date}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection