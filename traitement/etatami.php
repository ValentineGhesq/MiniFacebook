<?php

$sql = "UPDATE lien SET etat='ami' WHERE (idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?))";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id'],$_SESSION['id'],$_SESSION['id'],$_GET['id']));

?>