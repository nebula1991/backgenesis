<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
    <!--Barra Navegación-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{route('welcome')}}">StudioGenesis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    @foreach ($categories as $category )
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" id="dropdownCategory {{$category->id}}" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$category->name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownCategory {{$category->id}}">
                            @foreach ($category->subcategories as $subcategory )
                            <li>
                                <a class="dropdown-item" href="{{route('subcategory.show', $subcategory->id)}}">
                                    {{$subcategory->name}}
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach

                </ul>

                <li class="nat-item">
                    <a href="{{route('cart.show')}}">

                        <button class="btn btn-outline-dar text-white" type="submit">

                            <i class="fa-solid fa-cart-shopping"></i>

                            <span class="badge bg-white text-black ms-1 rounded-pill">{{ session('cart') ?
                                count(session('cart')) : 0 }}</span>
                        </button>

                    </a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="text-white text-decoration-none" href="{{route('login')}}" class="nav-link">Iniciar
                        Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="text-white text-decoration-none" href="{{route('register')}}"
                        class="nav-link">Registrate</a>
                </li>

                @else


                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @role('admin')

                    <li class="dropdown-item">
                        <a class="text-decoration-none" href="{{route('admin.dashboard')}}"
                            class="nav-link">Dashboard</a>
                    </li>

                    @endrole
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                        </form>
                    </li>

                </ul>


                </li>
                @endguest

            </div>
        </div>
    </nav>

    </div>

    <main class="py-4">
        @yield('content')
    </main>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/70176a9f8a.js" crossorigin="anonymous"></script>
</body>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Prueba StudioGenesis 2025</p>
    </div>
</footer>

</html>