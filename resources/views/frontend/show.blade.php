@extends('frontend.layouts.app')


@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0">
                <img src="{{ asset($product->image) }}" 
                     class="card-img-top rounded" 
                     style="height: 500px; object-fit: cover;"
                     alt="{{ $product->name }}"
                     onerror="this.src='{{ asset('images/products/placeholder.jpg') }}'">
            </div>
        </div>
        
        <div class="col-lg-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="text-muted mb-3">
                <span class="badge bg-secondary">{{ $product->category->name }}</span>
            </p>
            <h2 class="text-primary mb-4">€{{ number_format($product->price, 2) }}</h2>
            
            <div class="mb-4">
                <h3 class="h5">Descripción</h3>
                <p class="lead">{{ $product->description }}</p>
            </div>

            <div class="d-grid gap-2">
                <form action="{{route('cart.add', $product->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-primary">Añadir al carrito</button>
                </form>
            </div>

       
        </div>
    </div>
</div>
@endsection