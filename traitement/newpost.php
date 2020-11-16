<?php

$sql ="INSERT INTO ecrit(titre,contenu,dateEcrit,image,idAuteur,idAmi) VALUES( ? , ? ,'date('F j Y g:i a');,?,?,?') ";
$query = $pdo->prepare($sql);// Etape 1  : preparation
$query->execute(array($_POST['titre'],$_POST['contenu'], $_POST['image'], $_SESSION['id'], $_GET['id']));



?>