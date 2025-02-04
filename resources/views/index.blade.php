@extends('layouts.layout')





  @section('content')
  <!-- Contenido -->


  <!-- Main Content -->
  <main class="container my-5">


    <div class="row">

      @foreach ($products as $product)
      <!-- Producto 0 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
          <div class="card-body text-center">
            <div class="card-body text-center">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->description}}</p>
              <p class="card-text">€19.99</p>
              <button class="btn btn-success">Agregar al carrito</button>
            </div>
          </div>
        </div>
      </div>
        @endforeach





  </main>





</section>



@endsection