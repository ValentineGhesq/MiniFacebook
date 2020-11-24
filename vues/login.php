


<div class="titre"><h2> Bienvenue sur My Face</h2></div>
<div class="ladiv">
<div class="connexion">
  <h3>Se connecter</h3>
<form action="index.php?action=connexion" method="POST">
    <label for="nom">Identifiant :<br></label>
      <input type="text" name="nom" placeholder="nom" required>
    <label for="mdp"> <br> Mot de passe : <br></label>
      <input type="password" name="mdp" placeholder="mdp" minlength="4" required>
      <br>
      <input class="bouton" type="submit" name="connexion" value="envoyer" >
</form>
</div>
<div class="nouvcompt">
  <h3>Pas de compte ? <br>Créer le !</h3>
<form action="index.php?action=newcompte" method="POST">
    <label for="nom">Identifiant :<br></label>
      <input type="text" name="nom" placeholder="nom" required>
      <br>
    <label for="email">Adresse mail :<br></label>
      <input type="email" name="email" placeholder="email" required>
    <label for="mdp"> <br> Mot de passe :<br></label>
    <input type="password" name="mdp" placeholder="mdp" minlength="4" maxlength="20" required>
    <br>
    <input class="bouton" type="submit" name="creation" value="envoyer">
</form>
</div>
</div>
