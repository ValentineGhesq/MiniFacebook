<?php

$ami = false;

// Verifions si on est amis avec cette personne
$sql = "SELECT * FROM lien WHERE etat='ami'
        AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id'],$_SESSION['id']));

while($line=$q->fetch()) {
    if($line=="true"){
        $ami= true;
    }else{
        $ami = false;
    }
}

if($ami == false){
    $sql ="INSERT INTO lien(idUtilisateur1,idUtilisateur2,etat) VALUES( ? , ? ,'ami') ";
$query = $pdo->prepare($sql);// Etape 1  : preparation
$query->execute(array($_GET['id'],$_SESSION['id']));

$s ="INSERT INTO lien(idUtilisateur1,idUtilisateur2,etat) VALUES( ? , ? ,'ami') ";
$q = $pdo->prepare($s);// Etape 1  : preparation
$q->execute(array($_SESSION['id'],$_GET['id']));
} else{
    echo "vous êtes déjà ami ";
}

?>