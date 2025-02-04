

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
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                <a class="navbar-brand" href="{{ url('/') }}">
                    BackGenesis
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="/" class="nav-link">Todas</a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            
                            <a href="{{route('products.category',$category->name)}}"
                              class="nav-link">{{$category->name}}</a>
                    
                        </li>
                        @endforeach
                    </ul>

                    {{-- <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mt-2">
                       
             
                            <li class="nav-item dropdown">

                                   
                            </li> 
                    </ul> --}}
                
                </div>
        </nav>
    </header>
    <nav class="navbar navbar-light bg-main">
        <div class="container p-4">
         
        
        </div>
    </nav>

    @yield('content')
     

</body>