@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        {{-- <!-- Sidebar with filters -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Categorías</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a href="{{ route('welcome', ['category' => $category->id]) }}" 
                               class="list-group-item list-group-item-action">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Products grid -->
        <div class="col-md-12">
            <h1 class="mb-4 text-center">Productos</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
               
                @forelse ($products as $product)
                <div class="col">
                    <a href="{{route('product.show', $product->id)}}" class="text-decoration-none text-dark">
                   
                        <div class="card h-100 shadow-sm">
                            <img src="{{asset($product->image)}}" class="card-img-top" alt="{{ $product->name }}" 
                                 style="height: 200px; object-fit: cover;"
                                 onerror="this.src='{{ asset('images/products/placeholder.jpg') }}'">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->name }}</h5>
                                <p class="card-text text-muted text-center">{{ $product->category->name }}</p>
                                <p class="card-text text-center">{{ Str::limit($product->description, 100) }}</p>
                                <div class="card-text text-center">
                                    <span class="h5 mb-0">€{{ number_format($product->price, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center mt-4">
                                    <form action="{{route('cart.add', $product->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Añadir al carrito</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                @empty
              
                    <div class="col-12">
                        <div class="alert alert-info">
                            No hay productos disponibles en este momento.
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- <div class="mt-4 d-flex justify-content-center">
                {{ $products->links() }}
            </div> --}}
        </div>
    </div>
</div>

@endsection