<?php

    $sql = "SELECT * FROM user WHERE id NOT IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='ami' AND idUTilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='ami' AND idUTilisateur1=?)";
   
    $query= $pdo->prepare($sql);
    $query->execute(array( $_SESSION['id'], $_SESSION['id'])); 
    while($line=$query->fetch()){
        if(isset($_POST['recherche'])){
            if((strstr($line['login'],$_POST['recherche'])==TRUE)){
                echo"<a href='index.php?action=mur&id=".$line['id']."'>".$line['login']."</a>";
            }
    }
    
    }

?>