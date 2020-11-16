<?php

$sql = "SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC";
        $q = $pdo->prepare($sql);
        $q->execute(array($_GET['id']));

while($line=$q->fetch()) {

    if($line['image']!=""){
    echo "<div>
            <div> <h3>".$line['idAmi']."</h3> <p>".$line['dateEcrit']."</p></div>
            <div><h2>".$line['titre']."</h2> <p>".$line['contenu']."</p> </div>
            </div>";
    }else{
        echo "<div>
            <div> <h3>".$line['idAmi']."</h3> <p>".$line['dateEcrit']."</p></div>
            <div>
                <div><img src='".$line['image']."' alt='imagepost'> </div>
                <div><h2>".$line['titre']."</h2> <p>".$line['contenu']."</p></div> </div>
            </div>";

    }
}

?>