<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfileController;
use App\Models\Etudiant;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';



// Routes d'authentification
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

//ilay etudiants


// Route::middleware(['auth'])->group(
//     function () {};
// Liste des étudiants
Route::get('/etudiant', [EtudiantController::class, 'liste_etudiant'])->name('etudiant.liste');

// Ajouter un étudiant
Route::get('/ajouter', [EtudiantController::class, 'ajouter_etudiant'])->name('etudiant.ajouter');
Route::post('/ajouter/traitement', [EtudiantController::class, 'ajouter_etudiant_traitement'])->name('etudiant.ajouter_traitement');

// Modifier un étudiant
Route::get('/modifier-etudiant/{id}', [EtudiantController::class, 'modifier_etudiant'])->name('etudiant.modifier');
Route::post('/modifier/traitement', [EtudiantController::class, 'modifier_etudiant_traitement'])->name('etudiant.modifier_traitement');

// Supprimer un étudiant
Route::get('/supprimer-etudiant/{id}', [EtudiantController::class, 'supprimer_etudiant'])->name('etudiant.supprimer');

//Photos
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::post('/etudiants/upload/{id}', [EtudiantController::class, 'uploadPhoto'])->name('etudiants.upload');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Autres routes (accueil, liste, etc.)
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Route::get('/liste', function () {

    $etudiants = Etudiant::paginate(4);
    return view('liste', compact('etudiants'));
    // return view('liste');
})->name('liste');

Route::get('/fonctionnalite', function () {
    return view('fonctionnalite');
})->name('fonctionnalite');

Route::get('/photos', function () {
    return view('photos');
})->name('photos');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



// Route::get('/', function () {
//     return view('accueil');
// })->name('accueil');

// Route::get('/liste', function () {
//     return view('liste');
// })->name('liste');

// Route::get('/photos', function () {
//     return view('photos');
// })->name('photos');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Routes protégées
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// require __DIR__ . '/auth.php'; // Routes d'authentification
