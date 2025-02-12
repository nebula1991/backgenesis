
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   

    <style>
        .thead{
            background-color: lightblue;
       
        }
        h1{
            color: brown;
        }
    </style>
</head>
<body>
    <h1 class="text-center">PROVEEDORES</h1>
    <br>
    <table class="table" style="text-align: center; font-family: 20px;">
        <thead class="thead">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Telefono </th>
        </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>