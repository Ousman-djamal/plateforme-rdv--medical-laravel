<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Patient;
use App\Models\Specialite;
use App\Models\Medecin;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
});

Route::get('/inscription_patient', function () {

    return view('inscription_patient');
});

Route::post('/inscription_patient', function (Request $request) {
    
    // 1. Enregistrer l'utilisateur dans la table users
    $user = User::create([
        'name' => $request->nom . ' ' . $request->prenom,
        'email' => $request->mail,
        'password' => Hash::make($request->motdepass), // Hash du mot de passe
        'role' => 'patient',
    ]);

    // 2. Enregistrer les infos dans la table patients
    Patient::create([
        'user_id' => $user->id,
        'sexe' => $request->sexe,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->mail,
        'telephone' => $request->tel,
        'mot_de_passe' => Hash::make($request->motdepass), // Tu peux stocker ça, ou laisser vide
        'adresse' => $request->adr,
        'groupe_sanguin' => $request->grp,
        'date_naissance' => $request->date_n,
    ]);

    return back()->with('message', 'Inscription réussie !');
}); 

Route::get('/connexion', function () {

    return view('connexion');
});
// Traitement de connexion pour patients et médecins


Route::post('/connexion', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    $user = User::where('email', $email)->first();
// FAIRE LE @if ($errors->any()) DANS connexion.blade.php
    if (!$user) {
        // L'email n'existe pas
        return back()->withErrors(['email' => 'Email incorrect.']);
    }

    if (!Hash::check($password, $user->password)) {
        // L'email existe mais mot de passe faux
        return back()->withErrors(['password' => 'Mot de passe incorrect.']);
    }

    // Authentification manuelle réussie
    Auth::login($user);

    // Redirection selon le rôle
    if ($user->role === 'patient') {
        return redirect('/espace_patient');
    } elseif ($user->role === 'medecin') {
        return redirect('/espace_medecin');
    } else {
        Auth::logout();
        return back()->withErrors(['role' => 'Rôle non autorisé ici.']);
    }
});


Route::get('/espace_patient', function () {

    return view('espace_patient');
});

Route::get('/espace_medecin', function () {

    return view('espace_medecin');
});

// route pour espace_admin
Route::get('/espace_admin', function () {

    return view('espace_admin');
});

Route::post('/espace_medecin', function (Request $request) {

    return view('espace_medecin');
});


Route::get('/admin/ajoute_medecin', function () {
    $specialites = Specialite::all(); // Récupère toutes les spécialités etles traiter dans le select du formulaire de espace_admin
    return view('admin.ajoute_medecin', compact('specialites'));
})->name('admin.ajoute_medecin');

// post por l'ajout du medecin
Route::post('/admin/ajoute_medecin', function (Request $request) {
    // 1. Créer l'utilisateur
    $user = User::create([
        'name' => $request->nom . ' ' . $request->prenom,
        'email' => $request->mail,
        'password' => Hash::make($request->motdepass),
        'role' => 'medecin',
    ]);

    // 2. Créer le médecin
    Medecin::create([
        'user_id' => $user->id,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->mail,
        'mot_de_passe' => Hash::make($request->motdepass),
        'telephone' => $request->tel,
        'adresse_cabinet' => $request->adr_c,
        'ville' => $request->ville,
        'disponibilite' => $request->disp,
        'specialite_id' => $request->specialite_id, // récupéré depuis <select>
    ]);

    return back()->with('message', 'Médecin ajouté avec succès !');
})->name('admin.ajoute_medecin.submit');

// pour admin


// Route pour afficher le formulaire
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Traitement de la soumission du formulaire
Route::post('/admin/login', function (Request $request) {
    $credentials = $request->only('email', 'password');// recuperer a partir du formulaire de connexion de admin

    if (Auth::attempt($credentials)) {//Va chercher un utilisateur dans la table users et Vérifie le mot de passe (bcrypt)

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/espace_admin');
        } else {
            Auth::logout();
            return back()->withErrors(['email' => 'Vous n\'êtes pas administrateur.']);
        }
    }

    return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
})->name('admin.login.submit');


