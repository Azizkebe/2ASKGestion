<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{route('welcome')}}">
            <img style="border-radius: 50%;" src="{{asset('hello/images/logo_anpej.png')}}" class="img-fluid logo-image">

            <div class="d-flex flex-column">
                <strong class="logo-text">Gestion</strong>
                <small class="logo-slogan">Ressources Humaines</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-center ms-lg-5">
                {{-- <li class="nav-item">
                    <a class="nav-link active" href="index.html">Homepage</a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="about.html">About Gotto</a>
                </li> --}}

                <li class="nav-item dropdown">
                    {{-- <a class="nav-link dropdown-toggle" href="" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a> --}}

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href=""></a></li>

                        <li><a class="dropdown-item" href=""></a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">  </a>
                </li>

                <li class="nav-item ms-lg-auto">
                    <a class="nav-link" href="">  </a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link custom-btn btn-lg" href="{{route('login')}}">Se connecter</a>
                </li>
                @endguest
                @auth
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="btn btn-label-info btn-round me-2">tableau de bord</a>
                    <a class="nav-link secondary-btn btn-sm" href="{{route('deconnexion')}}">Se deconnecter</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
