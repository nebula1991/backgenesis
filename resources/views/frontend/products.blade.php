{{-- @extends('frontend.layouts.app') --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



   
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    @section('content')

<div class="container">
    <h2 class="mb-4">Productos en "{{ $subcategory->name }}"</h2> --}}
    @foreach($products as $product)
    <li>{{ $product->name }} - ${{ $product->price }}</li>
    @endforeach
   {{-- @if ($products->count() > 0)
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">${{ number_format($product->price, 2) }}</p>
                            <a href="#" class="btn btn-primary">Ver Producto</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No hay productos en esta subcategoría.</p>
    @endif --}}
</div>

@endsection

@stack('scripts')
</body>

</html>
