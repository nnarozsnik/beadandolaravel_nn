<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Romyk')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap">
</head>
<body>
    <!-- HEADER / NAVBAR -->
    <div class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ asset('images/default_etel.png') }}" style="height:50px; width:auto;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/home') }}">Főoldal</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url ('/about') }}">Rólunk</a>
                        </li>


                        <li class="nav-item dropdown {{ request()->is('receptek*') || request()->is('kategoriak/*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="{{ url('/receptek') }}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        Receptek
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($kategoriak as $kategoria)
            <a class="dropdown-item" href="{{ route('kategoriak.show', $kategoria->id) }}">
                {{ $kategoria->nev }}
            </a>
        @endforeach
    </div>
</li>

                       
                       
                     <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url ('/contact') }}">Kapcsolat</a>
                        </li>

                        <li class="nav-item">
    <a class="nav-link" href="{{ route('kereses') }}">🔍</a>
</li>
                        @auth
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('etelek.create') ? 'active' : '' }}" href="{{ route('etelek.create') }}">Új recept feltöltése</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('etelek.sajat') ? 'active' : '' }}" href="{{ route('etelek.sajat') }}">Saját receptjeim</a>
    </li>


    
@endauth
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                   
                    <ul class="navbar-nav ms-auto">
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-primary text-white" style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;" href="{{ route('register') }}">Regisztráció</a>
        </li>
    @endguest
    



    @auth
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->routeIs('messages.*') ? 'active' : '' }}" 
        href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            @if(Auth::user()->role === 'admin')
        <li><a class="dropdown-item" href="{{ route('admin.etelek-diagram') }}">Admin Panel</a></li>
        @endif
        <a class="dropdown-item" href="{{ route('messages.index') }}">Üzenetek</a>
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                
                <li>
           
            <a class="dropdown-item" href="{{ route('logout-page') }}">Kijelentkezés</a>
        </li>
            </ul>
        </li>
    @endauth
    
</ul>
</div>
</div>

                     <div class="fa fa-search form-control-feedback"></div>
                  </form>
                </div>
            </nav>
        </div>
    </div>

    <!-- DINAMIKUS TARTALOM -->
    <div class="main_content">
        @yield('content')
    </div>

    <!-- FOOTER -->
    

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


</body>
<div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free Html Templates</a> Distribution by <a href="https://themewagon.com">ThemeWagon</a></p>
         </div>
      </div>
</html>