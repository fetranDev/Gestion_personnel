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
Route::delete('/supprimer-etudiant/{id}', [EtudiantController::class, 'supprimer_etudiant'])->name('etudiant.supprimer');

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

// <?php


// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\StudentController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\HomeController;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Admin\DashboardControllers;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// | Ireto rehetra ireto dia routes ampiasain'ny navigateur (interface web).
// | Izy ireo dia voasokajy araka ny login, register, dashboard, admin, sy profil.
// |--------------------------------------------------------------------------
// */

// /*
// |--------------------------------------------------------------------------
// | Auth Routes (Login, Register, Logout)
// |--------------------------------------------------------------------------
// */

// // routes utilisateur
// Route::get('/create-test-user', function () {
//     return App\Models\User::create([
//         'firstname' => 'Admin',
//         'lastname' => 'Test',
//         'email' => 'admin@test.com',
//         'password' => bcrypt('password'),
//         'role' => 'admin'
//     ]);
// });

// // Routes publiques
// Auth::routes();

// // Routes utilisateur
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('user.dashboard');
// });

// // Routes admin
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });

// // Formulaire d'inscription
// Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
// // Traitement de l'inscription
// Route::post('register', [RegisteredUserController::class, 'store']);

// // Formulaire de connexion
// Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
// // Traitement de la connexion
// Route::post('login', [AuthenticatedSessionController::class, 'store']);

// // Déconnexion
// Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// /*
// |--------------------------------------------------------------------------
// | Accueil (public)
// |--------------------------------------------------------------------------
// */
// Route::get('/', function () {
//     return view('welcome');
// });

// /*
// |--------------------------------------------------------------------------
// | Tableau de bord (dashboard)
// |--------------------------------------------------------------------------
// | Accessible uniquement après authentification + email vérifié.
// */
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// /*
// |--------------------------------------------------------------------------
// | Routes pour Admin (gestion des étudiants)
// |--------------------------------------------------------------------------
// | Toutes ces routes sont accessibles uniquement après connexion.
// */
// Route::middleware('auth')->prefix('admin')->group(function () {
//     // Ex: /admin/students
//     Route::resource('/students', StudentController::class);
//     //crude
//     Route::prefix('admin')->group(function () {
//         Route::resource('students', \App\Http\Controllers\Admin\StudentController::class);
//     });


//     // Route::resource('/roles', RoleController::class);
//     // Route::resource('/permissions', PermissionController::class);
// });

// // routes amin
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::resource('students', \App\Http\Controllers\Admin\StudentController::class)
//         ->only(['create', 'store']);
// });

// /*
// |--------------------------------------------------------------------------
// | Routes pour la gestion du profil
// |--------------------------------------------------------------------------
// */
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // Autres routes définies dans auth.php (si il y en a)
// require __DIR__ . '/auth.php';
