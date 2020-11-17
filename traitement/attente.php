<?php

$sql = "UPDATE lien SET etat='ami' WHERE etat='attente' AND (idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?))";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id'],$_SESSION['id'],$_SESSION['id'],$_GET['id']));
while($line=$q->fetch()) {
        if($line['idUtilisateur1']==$_SESSION['id']){
        echo $line['login']."<form action='etatami' method='POST'>
        <input type='submit' name='accepter' value='accepter'><input type='submit' name='refuser' value='refuser'>
        </form";
        }else{
            $sql = "SELECT * FROM lien INNER JOIN user on idUtilisateur1=user.id WHERE etat ='attente' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
            $q = $pdo->prepare($sql);
            $q->execute(array($_GET['id'],$_SESSION['id'],$_SESSION['id'],$_GET['id']));
            while($line=$q->fetch()) {
                if($line['idUtilisateur2']==$_SESSION['id']){
                    echo $line['login']."<form action='etatami' method='POST'>
                    <input type='submit' name='accepter' value='accepter'><input type='submit' name='refuser' value='refuser'>
                    </form";;
                }
            }
     }
}
//INNER JOIN user on idUtilisateur1=user.id AND idUtilisateur2=user.id
?>