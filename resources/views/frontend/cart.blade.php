@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Mi Carrito</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(count($cartItems) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach($cartItems as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($details['image']) }}" 
                                         alt="{{ $details['name'] }}" 
                                         style="width: 50px; height: 50px; object-fit: cover;"
                                         class="me-3">
                                    {{ $details['name'] }}
                                </div>
                            </td>
                            <td>€{{ number_format($details['price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" 
                                           class="form-control form-control-sm" min="1" style="width: 70px;"
                                           onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>€{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td colspan="2"><strong>€{{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
            @auth
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{route('orders.checkout')}}" class="btn btn-success">Proceder al pago</a>
                </div>

            @else

                <div class="text-end">
                    <p class="text-muted mb-2">Necesitas iniciar sesión para realizar el pedido</p>
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Registrarse</a>
                </div>
            @endauth
   
    @else
        <div class="alert alert-info">
            Tu carrito está vacío.
        </div>
    @endif
</div>
@endsection