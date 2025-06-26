<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h2>je suis la page register</h2>
    <form action="" method="POST">
          @csrf

          <label for="sexe">Vous etes:  </label>
        M <input type="radio" name="sexe" id="m" value="M" required>
        F <input type="radio" name="sexe" id="f" value="F" required><br><br>

          <label for="nom"> Nom  </label>
         <input type="text" name="nom" id="nom" required><br><br>
         <label for="prenom"> Prenom  </label>
         <input type="text" name="prenom" id="prenom" required><br><br>
         <label for="mail">Email   </label>
         <input type="email" name="mail" id="mail" required><br><br>
         <label for="tel"> Tel </label>
         <input type="text" name="tel" id="tel" required><br><br>
         <label for="motdepass"> Mot de passe </label>
         <input type="password" name="motdepass" id="motdepass" required><br><br>

         <label for="adr"> Adresse</label>
         <input type="text" name="adr" id="adr" required><br><br>

         <label for="grp"> Groupe sanguin</label>
         <input type="text" name="grp" id="grp" required><br><br>

         <label for="date_n">Date de naissance   </label>
         <input type="date" name="date_n" id="date_n" required><br><br>

         
          <Button type="submit"  name="submit">Envoyer</Button>
    </form>
    @if(session('message'))
    <p style="color: green;">{{ session('message') }}</p>
@endif
    <a href="{{url('/connexion')}}">connecter vous</a>
</body>
</html>