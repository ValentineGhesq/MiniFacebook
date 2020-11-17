<?php
$ok = false;

    if(!isset($_GET["id"]) || ($_GET["id"]==$_SESSION["id"])){ 
        $id = $_SESSION["id"];
        $ok = true; // On a le droit d afficher notre mur
    } else {
        $id = $_GET["id"];
        // Verifions si on est amis avec cette personne
        $sql = "SELECT * FROM lien WHERE etat='ami'
                AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
        $q = $pdo->prepare($sql);
        $q->execute(array($_GET['id'],$_SESSION['id'],$_SESSION['id'],$_GET['id']));
        
        while($line=$q->fetch()) {
            if($line==true){
                $ok= true;
            }else{
                $ok = false;
            }

        }
    }
        // les deux ids à tester sont : $_GET["id"] et $_SESSION["id"]
        // A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que lon est pas ami avec cette personne
    
    if($ok==false) {
        echo "Vous n êtes pas encore ami, vous ne pouvez voir son mur !!";       
    } else {
        header("location: index.php?action=mur&id=".$_GET['id']."");
}
    ?>