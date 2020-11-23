<?php
     $sql = "SELECT * FROM aime INNER JOIN ecrit on idEcrit=ecrit.id WHERE idEcrit=? AND idUtilisateur= ? order by dateEcrit DESC ";
     $q = $pdo->prepare($sql);
     $q->execute(array($_GET['id'], $_SESSION['id']));
    $line=$q->fetch();
         
         if($line==true){

                    $sql = "DELETE FROM aime WHERE idUtilisateur= ? AND idEcrit= ? ";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_SESSION['id'], $_GET['id']));    
         }
        else if($line==false){
            $sql = "INSERT INTO aime(idEcrit,idUtilisateur) VALUES( ? , ?) ";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_GET['id'],$_SESSION['id']));
        }

        header("location:".  $_SERVER['HTTP_REFERER']);
        
         
        
            
        
       
    

?>