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
                <h1>Modifier un etudiant - laravel 10</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">

                <h2> Formulaire D'inscription</h2>
                @if (session ('status') )
                <div class="alert alert-succes">
                    {{ session ('status') }}
                </div>
                @endif
                <ul>
                    @foreach($errors ->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>

                <form action="{{ route('etudiant.modifier_traitement') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $etudiants->id }}">

                    <div class="row">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="Nom" value="{{ $etudiants->nom }}" placeholder="Entrez votre nom">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" value="{{ $etudiants->prenom}}" placeholder="Entrez votre prenom">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="classe" class="form-label">Classe</label>
                            <select id="classe" name="classe" class="form-control">
                                <option value="">Choisissez votre classe</option>
                                <option value="6èm">6èm</option>
                                <option value="6èm">5èm</option>
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
                    <div class="row">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Modifier un etudiant</button>
                            <a href="etudiant" class="btn btn-success">Revenir à la listes des etudiant</a>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>
