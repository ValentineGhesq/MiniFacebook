<?php
$sql = "SELECT * FROM lien INNER JOIN user on idUtilisateur1=user.id WHERE etat='attente' AND idUtilisateur2=?";
$q = $pdo->prepare($sql);
$q->execute(array($_SESSION['id']));
while($line=$q->fetch()) {

                echo "<ul>";
                  
                    echo "<li>".$line['login']."<form name='ok' action='index.php?action=etatami&id=".$line['id']."' method='POST'>
                    <input type='submit' name='accepter' value='accepter'><input type='submit' name='refuser' value='refuser'>
                    </form></li>";
                    
                echo "</ul>";
            }
          

//INNER JOIN user on idUtilisateur1=user.id AND idUtilisateur2=user.id
?>