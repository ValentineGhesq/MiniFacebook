<?php
$sql2="SELECT * FROM user WHERE login=? OR email=?";
$query = $pdo->prepare($sql2);// Etape 1  : preparation
$query->execute(array($_POST['nom'],$_POST['email'])); // Etape 2 : execution : 2 paramètres dans la requêtes !!

// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne.
$line=$query->fetch();
if($line==true){
  echo "<script type='text/javascript'>";
  echo "alert('Compte déjà existant');";
  
    
    if($line["login"]==$_POST['nom']){
      echo" alert('login déjà utilisé');";}
    else if($line["email"]==$_POST['email']){
      echo" alert('email déjà utilisé');";
  }
  echo "window.location.href='index.php?action=login';";
  echo "</script>";

}else{


 $sql ="INSERT INTO user(login,mdp,email,remember,avatar) VALUES( ? , PASSWORD(?), ? ,'','')";
$query = $pdo->prepare($sql);// Etape 1  : preparation
$query->execute(array($_POST['nom'],$_POST['mdp'],$_POST["email"])); // Etape 2 : execution : 2 paramètres dans la requêtes !!


// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne.

echo "<script type='text/javascript'>";
echo "alert('compte créé veuillez vous connecter');";
echo "window.location.href='index.php?action=login';";
echo "</script>";


}

?>