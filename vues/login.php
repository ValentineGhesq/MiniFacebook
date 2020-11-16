


<div class="titre"><h2> Bienvenue sur My Face</h2></div>

<div class="connexion">
  <h3>Se connecter</h3>
<form action="index.php?action=connexion" method="POST">
    <h4>Identifiant :</h4>
      <input type="text" name="nom" placeholder="nom" required>
      <h4>Mot de passe :</h4>
    <input type="password" name="mdp" placeholder="mdp" minlength="4" required>
    <input type="submit" name="connexion" value="envoyer" >
</form>
</div>
<div class="nouvcompt">
  <h3>Pas de compte ? <br>Créer le !</h3>
<form action="index.php?action=newcompte" method="POST">
    <h4>Identifiant :</h4>
      <input type="text" name="nom" placeholder="nom" required>
      <h4>Adresse mail :</h4>
      <input type="email" name="email" placeholder="email" required>
      <h4>Mot de passe :</h4>
    <input type="password" name="mdp" placeholder="mdp" minlength="4" maxlength="20" required>
    <input type="submit" name="creation" value="envoyer">
</form>
</div>
