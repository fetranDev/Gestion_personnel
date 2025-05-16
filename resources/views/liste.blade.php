<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @extends('layouts.app')

    @section('content')
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
                                <th scope="col">ID</th>
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

                                        <form action="{{ url('/supprimer-etudiant/' . $etudiant->id) }}"
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
    @endsection
</body>
</html>

{{-- index
{{-- <div class="container mt-5">
    <h2 class="mb-4">Liste des étudiants</h2>

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">➕ Ajouter un étudiant</a>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Nom & Prénom</th>
                <th>Status</th>
                <th>Parent 1</th>
                <th>Parent 2</th>
                <th>Niveau</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>

                    <td>
                        @if ($student->photo)
                            <img src="{{ asset('uploads/students/'.$student->photo) }}" width="70" alt="Photo Étudiant" class="img-thumbnail">
                        @else
                            <span class="text-muted">Aucune</span>
                        @endif
                    </td>

                    <td>
                        {{ $student->user->firstname ?? '-' }} {{ $student->user->lastname ?? '' }}
                    </td>

                    <td>{{ $student->status ?? '-' }}</td>

                    <td>
                        {{ $student->parent1_firstname ?? '-' }} {{ $student->parent1_lastname ?? '' }}
                    </td>

                    <td>
                        {{ $student->parent2_firstname ?? '-' }} {{ $student->parent2_lastname ?? '' }}
                    </td>

                    <td>{{ $student->advisor->name ?? '-' }}</td>

                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary"> Modifier</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cet étudiant ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"> Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-muted">Aucun étudiant trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div> --}}

@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic Form Example</h4>

            <!-- Form Wizard -->
            <div class="wizard">
                <!-- Steps -->
                <div class="steps mb-4">
                    <ul class="nav nav-pills justify-content-center" id="stepIndicators">
                        <li class="nav-item" data-step="1">
                            <span class="step-number">1</span>
                            Account
                        </li>
                        <li class="nav-item" data-step="2">
                            <span class="step-number">2</span>
                            Profile
                        </li>
                        <li class="nav-item" data-step="3">
                            <span class="step-number">3</span>
                            Hints
                        </li>
                        <li class="nav-item" data-step="4">
                            <span class="step-number">4</span>
                            Finish
                        </li>
                    </ul>
                </div>

                <!-- Form Content -->
                <form id="mainForm" class="mt-3">
                    <!-- Step 1 -->
                    <div class="step-content active" data-step="1">
                        <div class="form-group">
                            <label>User name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" required>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" required>
                            <div class="invalid-feedback">Le mot de passe doit contenir au moins 8 caractères</div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                            <div class="invalid-feedback">Les mots de passe ne correspondent pas</div>
                        </div>
                        <p class="text-muted"><span class="text-danger">*</span> Mandatory</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-content" data-step="2">
                        <div class="form-group">
                            <label>First name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstname" required>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label>Last name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastname" required>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">Format d'email invalide</div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <p class="text-muted"><span class="text-danger">*</span> Mandatory</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="step-content" data-step="3">
                        <ul class="list-group">
                            <li class="list-group-item">Foo</li>
                            <li class="list-group-item">Bar</li>
                            <li class="list-group-item">Foobar</li>
                        </ul>
                    </div>

                    <!-- Step 4 -->
                    <div class="step-content" data-step="4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsCheck" required>
                            <label class="form-check-label" for="termsCheck">
                                I agree with the Terms and Conditions
                            </label>
                            <div class="invalid-feedback">Vous devez accepter les conditions</div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="form-footer mt-4">
                        <button type="button" class="btn btn-secondary" onclick="previousStep()">Previous</button>
                        <button type="button" class="btn btn-primary float-end" onclick="nextStep()" id="nextButton">Next</button>
                        <button type="button" class="btn btn-success float-end" style="display: none;" onclick="submitForm()" id="finishButton">Finish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.invalid-feedback {
    display: none;
    color: #dc3545;
    font-size: 0.875em;
}

.is-invalid {
    border-color: #dc3545 !important;
}

.is-invalid ~ .invalid-feedback {
    display: block;
}

.nav-pills {
    gap: 20px;
}

.nav-item {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    border-radius: 20px;
    background: #f8f9fa;
    color: #6c757d;
    transition: all 0.3s ease;
}

.nav-item.active {
    background: #3b5de7 !important;
    color: white !important;
}

.step-number {
    display: inline-block;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #dee2e6;
    text-align: center;
    margin-right: 10px;
    line-height: 25px;
}

.nav-item.active .step-number {
    background: rgba(255,255,255,0.3);
    color: white;
}

.step-content {
    display: none;
    animation: fadeIn 0.3s;
}

.step-content.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>

<script>
let currentStep = 1;

// Validation principale
function validateStep(step) {
    let isValid = true;
    const currentStepElement = document.querySelector(`.step-content[data-step="${step}"]`);

    // Réinitialiser les erreurs
    currentStepElement.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

    // Validation spécifique à l'étape 1
    if(step === 1) {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');

        if(password.value.length < 8) {
            password.classList.add('is-invalid');
            isValid = false;
        }

        if(password.value !== confirmPassword.value) {
            confirmPassword.classList.add('is-invalid');
            isValid = false;
        }
    }

    // Validation spécifique à l'étape 2
    if(step === 2) {
        const email = document.getElementById('email');
        if(!validateEmail(email.value)) {
            email.classList.add('is-invalid');
            isValid = false;
        }
    }

    // Validation générale des champs requis
    currentStepElement.querySelectorAll('input, select, textarea').forEach(input => {
        if(input.required && !input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        }

        if(input.type === 'checkbox' && input.required && !input.checked) {
            input.classList.add('is-invalid');
            isValid = false;
        }
    });

    return isValid;
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function updateSteps() {
    // Mise à jour des indicateurs d'étape
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.toggle('active', parseInt(item.dataset.step) === currentStep);
    });

    // Mise à jour du contenu
    document.querySelectorAll('.step-content').forEach(step => {
        step.classList.toggle('active', parseInt(step.dataset.step) === currentStep);
    });

    // Gestion des boutons
    const nextButton = document.getElementById('nextButton');
    const finishButton = document.getElementById('finishButton');

    if(currentStep === 4) {
        nextButton.style.display = 'none';
        finishButton.style.display = 'inline-block';
    } else {
        nextButton.style.display = 'inline-block';
        finishButton.style.display = 'none';
    }
}

function nextStep() {
    if(validateStep(currentStep)) {
        if(currentStep < 4) currentStep++;
        updateSteps();
    }
}

function previousStep() {
    if(currentStep > 1) currentStep--;
    updateSteps();
}

function submitForm() {
    if(validateStep(4)) {
        alert('Submitted!');
        document.getElementById('mainForm').reset();
        currentStep = 1;
        updateSteps();
    }
}

// Validation en temps réel
document.getElementById('password').addEventListener('input', function() {
    this.classList.toggle('is-invalid', this.value.length < 8);
});

document.getElementById('confirmPassword').addEventListener('input', function() {
    this.classList.toggle('is-invalid', this.value !== document.getElementById('password').value);
});

document.getElementById('email').addEventListener('input', function() {
    this.classList.toggle('is-invalid', !validateEmail(this.value));
});

// Initialisation
updateSteps();
</script>
@endsection

{{-- <div class="row"> --}}
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <h4 class="card-title mb-4">Informations sur le parent 1</h4>

                    {{-- Message de succès --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Messages d'erreur --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Photo --}}
                    <div class="form-group row mb-3">
                        <label for="photo" class="col-sm-3 text-end control-label col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="photo" id="photo">
                        </div>
                    </div>

                    {{-- Prénom --}}
                    <div class="form-group row mb-3">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Prénom du parent 1</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="parent1_firstname" value="{{ old('parent1_firstname') }}" placeholder="Ex: Jean">
                        </div>
                    </div>

                    {{-- Nom --}}
                    <div class="form-group row mb-3">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Nom du parent 1</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="parent1_lastname" value="{{ old('parent1_lastname') }}" placeholder="Ex: Rakoto">
                        </div>
                    </div>

                    {{-- Téléphone --}}
                    <div class="form-group row mb-3">
                        <label for="phone" class="col-sm-3 text-end control-label col-form-label">Téléphone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="parent1_phone" value="{{ old('parent1_phone') }}" placeholder="Ex: 0331234567">
                        </div>
                    </div>

                    {{-- Commentaires --}}
                    <div class="form-group row mb-3">
                        <label for="comments" class="col-sm-3 text-end control-label col-form-label">Commentaires</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="comments" name="comments" placeholder="Commentaires...">{{ old('comments') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{-- </div> --}}

{{-- <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic Form Example</h4>

            <!-- Form Wizard -->
            <div class="wizard">
                <!-- Steps -->
                <div class="steps mb-4">
                    <ul class="nav nav-pills justify-content-center" id="stepIndicators">
                        <li class="nav-item" data-step="1">
                            <span class="step-number">1</span>
                            Account
                        </li>
                        <li class="nav-item" data-step="2">
                            <span class="step-number">2</span>
                            Profile
                        </li>
                        <li class="nav-item" data-step="3">
                            <span class="step-number">3</span>
                            Hints
                        </li>
                        <li class="nav-item" data-step="4">
                            <span class="step-number">4</span>
                            Finish
                        </li>
                    </ul>
                </div>

                <!-- Form Content -->
                <form class="mt-3" method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Step 1 -->
                    <div class="step-content active" data-step="1">
                        <div class="form-group">
                            <label>User name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" required>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" required>
                            <div class="invalid-feedback">Le mot de passe doit contenir au moins 8 caractères</div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                            <div class="invalid-feedback">Les mots de passe ne correspondent pas</div>
                        </div>
                        <p class="text-muted"><span class="text-danger">*</span> Mandatory</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-content" data-step="2">
                        <div class="form-group">
                            <label>Photos<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="photo" id="photo" required>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label for="lname">Nom du parent 1<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lname" name="parent1_lastname" value="{{ old('parent1_lastname') }}" required>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label for="fname">Prénom du parent 1<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fname" name="parent1_firstname" value="{{ old('parent1_firstname') }}" required>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">Format d'email invalide</div>
                        </div>
                        <div class="form-group">
                            <label>Commentaires <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="comments" name="comments" placeholder="Commentaires...">{{ old('comments') }}</textarea>
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone<span class="text-danger">*</span></label>
                            <input class="form-control" id="phone" name="parent1_phone" value="{{ old('parent1_phone') }}">
                            <div class="invalid-feedback">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <p class="text-muted"><span class="text-danger">*</span> Mandatory</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="step-content" data-step="3">
                        <ul class="list-group">
                            <li class="list-group-item">Foo</li>
                            <li class="list-group-item">Bar</li>
                            <li class="list-group-item">Foobar</li>
                        </ul>
                    </div>

                    <!-- Step 4 -->
                    <div class="step-content" data-step="4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsCheck" required>
                            <label class="form-check-label" for="termsCheck">
                                I agree with the Terms and Conditions
                            </label>
                            <div class="invalid-feedback">Vous devez accepter les conditions</div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="form-footer mt-4">
                        <button type="button" class="btn btn-secondary" onclick="previousStep()">Previous</button>
                        <button type="button" class="btn btn-primary float-end" onclick="nextStep()" id="nextButton">Next</button>
                        <button type="button" class="btn btn-success float-end" style="display: none;" onclick="submitForm()"  id="finishButton">Finish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
