<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;

class etudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.liste', compact('etudiants'));
    }

    public function uploadPhoto(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($etudiant->photo) {
            Storage::delete('public/photos/' . $etudiant->photo);
        }

        $photoName = time() . '.' . $request->photo->extension();
        $request->photo->storeAs('public/photos', $photoName);

        $etudiant->update(['photo' => $photoName]);

        return redirect()->back()->with('success', 'Photo mise à jour avec succès!');
    }
    public function liste_etudiant()
    {
        // $etudiants = Etudiant::all();
        $etudiants = Etudiant::paginate(4);
        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant()
    {
        return view('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        //validation des donnee
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour la photo
        ]);
        // Création d'un nouvel étudiant
        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        // Si une photo est téléchargée, on l'enregistre et met à jour le champ 'photo'
        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/photos', $photoName);
            $etudiant->photo = $photoName;  // Enregistrer le nom de la photo dans la base de données
        }

        // Sauvegarde de l'étudiant dans la base de données
        $etudiant->save();

        // return redirect('/ajouter')->with('status', 'l\'etudiant a bien ete ajouter succes ');
        return redirect()->route('etudiant.liste')->with('status', 'L\'étudiant a bien été ajouté avec succès');
    }

    public function modifier_etudiant($id)
    {
        $etudiant = Etudiant::find($id);
        if (!$etudiant) {
            return redirect()->route('etudiant.liste')->with('status', 'Étudiant introuvable.');
        }
        return view('etudiant.modifier', ['etudiants' => $etudiant]);
    }

    public function modifier_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->update();

        return redirect('/etudiant')->with('status', 'l\'etudiant a bien ete modifier succes ');
    }

    public function supprimer_etudiant($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect('/etudiant')->with('status', 'l\'etudiant a bien ete supprimer succes ');
    }

    // public function login()
    // {
    //     User::create([
    //         'name' => 'fetra',
    //         'email' => 'fetra@gmail.com',
    //         'password' => Hash::make('0000')
    //     ]);
    // }
}
