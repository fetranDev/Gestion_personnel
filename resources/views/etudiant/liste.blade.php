<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUDE Étudiant en Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-4">
            <h1 class="mb-0">Gestion des Étudiants</h1>
            <a href="/ajouter" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Ajouter un étudiant
            </a>
        </div>

        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0"><i class="fas fa-users"></i> Liste des étudiants</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Photo</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etudiants as $etudiant)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td><span class="badge bg-secondary">{{ $etudiant->classe }}</span></td>
                                <td>
                                    @if ($etudiant->photo)
                                    <img src="{{ asset('storage/photos/' . $etudiant->photo) }}"
                                         class="img-thumbnail"
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                    <div class="text-muted">
                                        <i class="fas fa-image fa-2x"></i>
                                        <small class="d-block">Aucune image</small>
                                    </div>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <form action="{{ route('etudiants.upload', $etudiant->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data"
                                              class="d-inline">
                                            @csrf
                                            <div class="input-group input-group-sm">
                                                <input type="file"
                                                       name="photo"
                                                       class="form-control form-control-sm"
                                                       required>
                                                <button type="submit" class="btn btn-sm btn-outline-success">
                                                    <i class="fas fa-upload"></i>
                                                </button>
                                            </div>
                                        </form>

                                        <a href="{{ route('etudiant.modifier', $etudiant->id) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('etudiant.supprimer', $etudiant->id) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Êtes-vous sûr ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $etudiants->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
