@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
        <h1 class="mt-4">¡Gracias por tu pedido!</h1>
        <p class="lead">Tu número de pedido es: {{ $order->order_number }}</p>
        <p>Te hemos enviado un email con los detalles de tu pedido.</p>
        <a href="{{ route('welcome') }}" class="btn btn-primary mt-4">Volver a la tienda</a>
    </div>
</div>
@endsection