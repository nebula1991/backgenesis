
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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
    <h1 class="text-center">CATEGORIAS</h1>
    <br>
    <table class="table" style="text-align: center; font-family: 20px;">
        <thead class="thead">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>   
                    <td>{{$category->id}}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>  
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>