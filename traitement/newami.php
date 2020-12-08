<?php

$ami = false;

// Verifions si on est amis avec cette personne
$sql = "SELECT * FROM lien WHERE etat='ami'
        AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id'],$_SESSION['id'],$_SESSION['id'],$_GET['id']));

while($line=$q->fetch()) {
    if($line==true){
        $ami= true;
    }else{
        $ami = false;
    }
}

if($ami == false){

$s ="INSERT INTO lien(idUtilisateur1,idUtilisateur2,etat) VALUES( ? , ? ,'attente') ";
$q = $pdo->prepare($s);// Etape 1  : preparation
$q->execute(array($_SESSION['id'],$_GET['id']));
} else{
    echo "<script type='text/javascript'>";
    echo "alert('vous êtes déjà ami');";
    echo "</script>";

}
header("location:".  $_SERVER['HTTP_REFERER']);







?>