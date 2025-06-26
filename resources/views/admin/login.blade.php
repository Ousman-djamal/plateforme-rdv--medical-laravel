<!DOCTYPE html>
<html>
<head>
    <title>Connexion Admin</title>
</head>
<body>
    <h2>Connexion Administrateur</h2>

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <label>Email :</label>
        <input type="email" name="email" required><br><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Entrer</button>
    </form>

    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif
</body>
</html>
