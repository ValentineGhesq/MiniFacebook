<?php

$sql = "SELECT * FROM ecrit INNER JOIN user on idAmi=user.id WHERE idAmi=? order by dateEcrit DESC ";
        $q = $pdo->prepare($sql);
        $q->execute(array($_GET['id']));

while($line=$q->fetch()) {
    
 
    if($line['image']==""){
    echo "<div>
            <div> <h3>".$line['login']."</h3> <p>".$line['dateEcrit']."</p><a href='index.php?action=aime&id=".$line['id']."'> <img src='divers/pouce1.png' width='5%' alt='pouce'></a> <p>";
            $likes = 0;
            $sql = "SELECT * FROM aime INNER JOIN ecrit on idEcrit=ecrit.id WHERE idEcrit=? order by dateEcrit DESC ";
            $q = $pdo->prepare($sql);
            $q->execute(array($line['id']));
            
            while($line=$q->fetch()){
            $likes = $likes + 1 ;
            };
            echo $likes;
    echo " </p></div>
            <div><h2>".$line['titre']."</h2> <p>".$line['contenu']."</p> </div>
            </div>";
    
    }else{
        echo "<div>
            <div> <h3>".$line['idAmi']."</h3> <p>".$line['dateEcrit']."</p> <a href='index.php?action=aime&id=".$line['id']."'> <img src='divers/pouce1.png' alt='pouce'></a></div>
            <div>
                <div><img src='".$line['image']."' alt='imagepost'> </div>
                <div><h2>".$line['titre']."</h2> <p>".$line['contenu']."</p></div> </div>
            </div>";
    }
    

   
    
}

?>