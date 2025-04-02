<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
    <h1>Fonctionnalité</h1>
    <p>
4️⃣ Fonctionnalités Backend (Laravel - API RESTful)

📌 1. Gestion des Machines

CRUD pour les machines

Association des machines avec les consommations<br>


📌 2. Saisie des Consommations

Enregistrement des consommations manuelles

Validation des entrées utilisateur<br>


📌 3. Calcul Automatique des Émissions

Conversion des consommations en kg CO₂

Enregistrement des émissions calculées<br>


📌 4. Génération de Rapports

Création de fichiers PDF avec résumé des émissions

Stockage et téléchargement des rapports<br>


📌 5. Gestion du Marché du Carbone

Affichage et mise à jour du prix de la tonne de CO₂

Calcul du coût d’achat/vente de carbone<br>


📌 6. Alertes et Notifications

Envoi d’alertes en cas de dépassement des seuils

Recommandations basées sur l’analyse des données<br>


📌 7. Authentification et Gestion des Utilisateurs

Connexion / Inscription

Gestion des permissions selon le rôle<br>



---

5️⃣ Fonctionnalités Frontend (React.js - Interfaces Interactives) :

📌 1. Tableau de Bord Dynamique

Affichage en temps réel des émissions

Graphiques de comparaison mensuelle<br>


📌 2. Formulaire de Saisie des Données

Champ pour entrer la consommation

Sélection du type d’énergie

Bouton pour calculer et afficher les émissions<br>


📌 3. Gestion des Machines

Interface CRUD pour ajouter, modifier, supprimer des machines<br>


📌 4. Génération et Téléchargement des Rapports

Bouton pour générer un rapport PDF

Historique des rapports générés<br>


📌 5. Affichage du Marché du Carbone

Section affichant le prix actuel

Calculateur pour estimer le coût carbone de l’entreprise<br>

📌 6. Notifications et Alertes

Affichage d’un message si les émissions dépassent un seuil

Affichage des recommandations<br>

📌 7. Authentification et Sécurité

Page de connexion et gestion des rôles <br>

6️⃣ Résumé des Étapes de Développement : <br>
🔹 Étape 1 : Configuration du Backend (Laravel) : <br>
1. Créer les modèles et migrations MySQL<br>
2. Développer les routes API (gestion des machines, consommations, etc.)<br>
3. Implémenter le calcul automatique des émissions<br>
4. Ajouter la gestion du marché du carbone<br>

🔹 Étape 2 : Développement du Frontend (React.js) : <br>

1. Configurer l’authentification utilisateur<br>
2. Implémenter le tableau de bord et les formulaires<br>
3. Connecter React aux API Laravel<br>
4. Ajouter les graph<br>
</p>
@endsection

</body>
</html>
