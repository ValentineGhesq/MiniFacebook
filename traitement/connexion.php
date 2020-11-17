<?php

$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";

$query = $pdo->prepare($sql);// Etape 1  : preparation
$query->execute(array($_POST['nom'],$_POST['mdp'])); // Etape 2 : execution : 2 paramètres dans la requêtes !!

// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne.
$line=$query->fetch();
// un seul fetch
if($line==false){
    header('location: index.php?action=login');
}else{
    session_start();
    $_SESSION['id']= $line['id'];
   $_SESSION['login']= $line['login']; 
    header('location: index.php?action=mur&id='.$_SESSION['id']);
}

// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire

// sinon on crée les variables de session $_SESSION['id'] et $_SESSION['login'] et on va à la page d'accueil
?>