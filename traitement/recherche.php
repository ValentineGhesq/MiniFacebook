<?php

    $sql = "SELECT * FROM user ";
    $query= $pdo->prepare($sql);
    $query->execute(); 
    while($line=$query->fetch()){
        if(isset($_POST['recherche'])){
            if((strstr($line['login'],$_POST['recherche'])==TRUE)){
                echo"<a href='index.php?action=mur&id=".$line['id']."'>".$line['login']."</a>";
            }
    }
    
    }

?>