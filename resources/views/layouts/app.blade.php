<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu et Authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: rgb(218, 113, 113);
            /* background-image:  url(DSC_9615.jpg); */
            height: 100vh;
            background-position: center;
            background-size: cover;
            padding: 0px;
            margin: 0px;
            text-decoration: none;
            color: darkgreen;
            border: 1px solid #fff;
            border-radius: 3px;
            background: #fff;
            margin: 10px;
            padding: 10px 10px;
            transition: 0.5s;
        }
        .container{
            background-color: rgb(140, 226, 140);
            color: rgb(8, 161, 15);
            padding: 10px 30px;
            border: 2px solid #8a1313;
            border-radius: 6px;
        }
        .container-fluid{
                background-color: greenyellow;
            }

    </style>

</head>
<body>
    <!-- Menu Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">NotreSite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
             <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('liste') }}">Liste</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fonctionnalite') }}">fonctionnalite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photos') }}">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li> --}}

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->

    <div class="container mt-5">
        <h1>EcoBiz</h1>
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
