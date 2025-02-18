<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .order-details { margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        .total { font-weight: bold; text-align: right; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmación de Pedido</h1>
            <p>Pedido #{{ $order->order_number }}</p>
        </div>

        <div class="order-details">
            <h2>Detalles del Pedido</h2>
            <p><strong>Nombre:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Teléfono:</strong> {{ $order->phone }}</p>
            <p><strong>Dirección:</strong> {{ $order->address }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>€{{ number_format($item->price, 2) }}</td>
                        <td>€{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <p>Total: €{{ number_format($order->total_amount, 2) }}</p>
        </div>
    </div>
</body>
</html>