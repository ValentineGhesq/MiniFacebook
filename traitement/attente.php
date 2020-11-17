<?php
$sql = "SELECT * FROM lien WHERE etat='attente' AND ((idUtilisateur1=?) OR (idUtilisateur2=?))";
$q = $pdo->prepare($sql);
$q->execute(array($_SESSION['id'],$_SESSION['id']));
while($line=$q->fetch()) {
    
            $sql = "SELECT * FROM lien  JOIN user on idUtilisateur2=user.id WHERE etat='attente'";
            $q = $pdo->prepare($sql);
            $q->execute();
            while($line=$q->fetch()) {
                echo "<ul>";
                    if($line['idUtilisateur1']==$_SESSION['id']){
                    echo "<li>".$line['login']."<form name='ok' action='index.php?action=etatami&id=".$line['id']."' method='POST'>
                    <input type='submit' name='accepter' value='accepter'><input type='submit' name='refuser' value='refuser'>
                    </form></li>";
                    }
                echo "</ul>";
            }
            $sql2 = "SELECT * FROM lien JOIN user on idUtilisateur1=user.id WHERE etat='attente'";
            $query = $pdo->prepare($sql2);
            $query->execute();
            while($line=$query->fetch()) {
                echo "<ul>";
                    if($line['idUtilisateur2']==$_SESSION['id']){
                        echo "<li>".$line['idUtilisateur2']."<form action='index.php?action=etatami&id=".$line['id']."' method='POST'>
                        <input type='submit' name='accepter' value='accepter'><input type='submit' name='refuser' value='refuser'>
                        </form></li>";
                    }
                  
            echo "</ul>";
        }
    }

//INNER JOIN user on idUtilisateur1=user.id AND idUtilisateur2=user.id
?>