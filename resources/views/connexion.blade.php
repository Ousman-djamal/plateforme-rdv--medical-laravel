<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="" method="POST">
     @csrf
          <label for="email">Email</label>
          <input type="email" name="email" required><br><br>

           <label for="password">Mot de passe</label>
          <input type="password" name="password" required ><br><br>

           <label for="role">Vous etes?</label>
          <select name="role">
               <option value="patient">Patient</option>
               <option value="medecin">Médecin</option>
               
          </select>
          <button type="submit">entrez</button><br><br>




    </form>
    <!-- Erreurs affichées ; faut faire le return back()->withErrors() dans WEB.PHP DANS LA ROUTE POST LIEE CONNEXION  -->
@if ($errors->any())
    <div style="color:red;">
        {{ $errors->first() }}
    </div>
@endif
    <a href="{{url('/')}}">retour vers acceuil</a>
</body>
</html>