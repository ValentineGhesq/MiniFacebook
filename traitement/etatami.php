<?php
if(isset($_POST['accepter'])){
    $sql = "UPDATE lien SET etat='ami' WHERE etat='attente' AND (idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?))";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['id'],$_GET['id'],$_GET['id'],$_SESSION['id']));
    header("location:" .  $_SERVER['HTTP_REFERER']);
}else if(isset($_POST['refuser'])){
    $sql = "UPDATE lien SET etat='banni' WHERE etat='attente' AND (idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?))";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['id'],$_GET['id'],$_GET['id'],$_SESSION['id']));
    ?>
    <script type='text/javascript'>
            alert('vous avez banni cette personne !');
    </script>
    
    <?php
    header("location:" .  $_SERVER['HTTP_REFERER']);
}

?>