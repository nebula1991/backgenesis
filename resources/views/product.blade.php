@extends('layouts.layout')

@section('title')
    {{$product->name}}
@endsection

@section('content')
    <!-- Contenido -->
    <section class="container-fluid content">
     
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