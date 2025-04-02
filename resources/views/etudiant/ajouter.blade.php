<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUDE etudiant en laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>Ajouter un etudiant - laravel 10</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">

                <h2> Formulaire D'inscription</h2>
                @if (session ('status') )
                <div class="alert alert-success">
                    {{ session ('status') }}
                </div>
                @endif
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>

                <!-- Formulaire de création étudiant avec ajout photo -->
                <form action="{{ route('etudiant.ajouter_traitement') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="Nom" placeholder="Entrez votre nom" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrez votre prenom" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="classe" class="form-label">Classe</label>
                            <select id="classe" name="classe" class="form-control" required>
                                <option value="">Choisissez votre classe</option>
                                <option value="6èm">6èm</option>
                                <option value="5èm">5èm</option>
                                <option value="4èm">4èm</option>
                                <option value="3èm">3èm</option>
                                <option value="2and">2and</option>
                                <option value="1ér">1ér</option>
                                <option value="Terminal">Terminal</option>
                                <option value="L1">L1</option>
                                <option value="L2">L2</option>
                                <option value="L3">L3</option>
                                <option value="M1">M1</option>
                                <option value="M2">M2</option>
                            </select>
                        </div>
                    </div>

                    <!-- Ajout de l'input pour la photo -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo (Optionnelle)</label>
                            <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Ajouter un etudiant</button>
                            <a href="{{ route('etudiant.liste') }}" class="btn btn-success">Revenir à la liste des étudiants</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
