@extends('layouts.app')

@section('content')
 


        <div class="container">
            <h1>Productos</h1>
            <div class="row">
                @foreach ($products as  $product)
                <div class="col-lg-4 col-md-12">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="#" class="btn btn-primary">Ver detalles</a>
                        </div>
                
                </div>
              @endforeach
    
            </div>
          </div>
        
    </div>
       
          
      




@endsection