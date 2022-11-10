<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        .headermenu {
            width: 100%;
            
            background: #D9D9D9;
            text-align:center;
        }
        .headermotivation {
            width: 100%;
            height: 9vh;

            background: #F0BDBD;
            text-align:center;
        }
        .productpromo {
            position: absolute;
            width: 140vh;
            height: 50vh;
            left: 28vh;
            top: 22vh;

            background: #D9D9D9;
            border-radius: 30px;
        }
        .price {
            position: absolute;
            width: 208px;
            height: 45px;
            left: 5vh;
            top: 52vh;

            text-align:center;
        }
        .description {
            position: absolute;
            width: 100vh;
            height: 10vh;
            left: 1vh;
            top: 58vh;
        }
        .productstop {
            position: absolute;
            width: 150vh;
            left: 20vh;
            top: 90vh;

            background: #D9D9D9;
            border-radius: 35px;
        }
        .nameredproductstop {
            width: 100%;
            height: 7vh;

            background: #F0BDBD;    
            border-radius: 35px;
            text-align:center;
            Font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
        }
    </style>
    <title>@yield('titleweb')</title>
</head>
<body>
    <div class="headermenu shadow">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @endguest
        <div class="headermotivation">
            @yield('motivation')
        </div>
        @if((Auth::check()) && (Auth::user()->isAdmin()))
        <a href="/admin" class="btn" style="margin:10px;">listar clientes</a>
        <a href="{{url('admin/create')}}" class="btn" style="margin:10px;">Adicionar cliente</a> |
        <a href="/mensalidade" class="btn btn-light" style="margin:10px;">listar mensalidades</a>
        <a href="{{url('mensalidade/create')}}" class="btn btn-light" style="margin:10px;">Adicionar mensalidade</a> |
        @endif
        <a href="/produto" class="btn" style="margin:10px;">listar produtos</a>
        @if((Auth::check()) && (Auth::user()->isAdmin()))
        <a href="{{url('produto/create')}}" class="btn" style="margin:10px;">Adicionar produto</a> |
        @endif
        <a href="/academia" class="btn btn-light" style="margin:10px;">Nossa Academia</a>
        
    </div>
    
    <div>
        @yield('content')
    </div>
</body>
</html>