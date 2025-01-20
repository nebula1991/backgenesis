@extends('layouts.layout')

@section('title')
    BackGenesis
@endsection

@section('content')
    <!-- Contenido -->
    <section class="container-fluid content">
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center mb-5">
                  <a href="/" class="mx-3 pb-3 link-category d-block d-md-inline" >Todas</a>
                  
                  <!-- Mostrar Categorías de la base de datos -->
                  @foreach ($categories as $category)
                  <a href="{{route('products.category',$category->name)}}" class="mx-3 pb-3 link-category d-block d-md-inline" >{{$category->name}}</a>
                      
                  @endforeach
              
                    
                </nav>
            </div>
        </div>

        <!-- Main Content -->
  <main class="container my-5">
    

    <div class="row">

      @foreach ($products as $product)
      <!-- Producto 0 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="#" class="card-img-top" alt="Producto 1">
          <div class="card-body text-center">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">€19.99</p>
            <button class="btn btn-success">Agregar al carrito</button>
          </div>
        </div>
      </div>
    @endforeach



 
     
  </main>

       

     
       
    </section>
    
  
       
@endsection