


<div class="titre"><h2> Bienvenue sur My Face</h2></div>

<div>
<form action="index.php?action=connexion" method="POST">
      <input type="text" name="nom" placeholder="nom" required>
    <input type="password" name="mdp" placeholder="mdp" minlength="4" required>
    <input type="submit" name="connexion" value="envoyer" >
</form>
</div>
<div>
<form action="index.php?action=newcompte" method="POST">
      <input type="text" name="nom" placeholder="nom" required>
      <input type="email" name="email" placeholder="email" required>
    <input type="password" name="mdp" placeholder="mdp" minlength="4" maxlength="20" required>
    <input type="submit" name="creation" value="envoyer">
</form>
</div>
