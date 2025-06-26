<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajoute medecin</title>
</head>
<body>
    <h2>Ajouter un médecin</h2>

    @if(session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    <form method="POST" action="">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom" required><br><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" required><br><br>

        <label>Email :</label>
        <input type="email" name="mail" required><br><br>

        <label>Téléphone :</label>
        <input type="text" name="tel" required><br><br>

        <label>Mot de passe :</label>
        <input type="password" name="motdepass" required><br><br>

        <label>Ville :</label>
        <input type="text" name="ville" required><br><br>

        <label>Adresse cabinet :</label>
        <input type="text" name="adr_c" required><br><br>

        <label>Disponibilité :</label>
        <input type="text" name="disp" required><br><br>

        <label>Spécialité :</label>
        <select name="specialite_id" required>
            <option value="">-- Choisir une spécialité --</option>
            @foreach($specialites as $spec)<!--on a recuperer tous les specialites avec requete sql conrespondante de laravel dans la route get-->
                <option value="{{ $spec->id }}">{{ $spec->nom }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
