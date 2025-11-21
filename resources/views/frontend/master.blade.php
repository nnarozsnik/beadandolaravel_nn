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

                        <li class="nav-item {{ request()->routeIs('services') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url ('/services') }}">Services</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('blog') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url ('/blog') }}">Blog</a>
                     </li>
                     <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url ('/contact') }}">Kapcsolat</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                     <div class="login_bt"><a href="#">Login <span style="color: #222222;"><i class="fa fa-user" aria-hidden="true"></i></span></a></div>
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
    <div class="footer_section">
        <div class="container">
            <p class="copyright_text">==============</p>
        </div>
    </div>

    

    <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 


</body>
</html>