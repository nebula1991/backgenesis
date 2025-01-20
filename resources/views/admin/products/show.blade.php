@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Producto</h1>
@stop

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/products">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="create">Add Product</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Show Product
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('products.index') }}"> Back </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col-md-6">
                            <strong>Name:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Description:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="col-md-6">
                            <strong>Image:</strong>
                            {{ $product->image }}
                        </div>
                        <div class="col-md-6">
                            <strong>Category :</strong>
                            {{ $product->category_id }}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
