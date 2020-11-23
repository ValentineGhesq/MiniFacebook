<?php
if(isset($_POST['accepter'])){
    $sql = "UPDATE lien SET etat='ami' WHERE etat='attente' AND (idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?))";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'],$_SESSION['id'],$_SESSION['id'],$_GET['id']));
}else if(isset($_POST['refuser'])){
    $sql = "UPDATE lien SET etat='banni' WHERE etat='attente' AND (idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?))";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'],$_SESSION['id'],$_SESSION['id'],$_GET['id']));
    echo "<script type='text/javascript'>";
    echo "alert('vous avez refusé l'amitié');";
    echo "</script>";
}

?>