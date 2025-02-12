<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Envio Pedidos</title>
</head>
<body>
    <h1>Nuevo Pedido</h1>

   
    <p>Se ha creado un nuevo pedido en nuestro sistema. A continuación, se detalla la información del pedido:</p>

    <ul>
        <li><strong>Título:</strong> {{$event->title}}</li>
        <li><strong>Producto:</strong> {{$event->product->name}} | {{$event->product->description}}</li>
        <li><strong>Unidades:</strong> {{$event->units}}</li>
    </ul>
</body>
</html>