<form action="index.php?action=newpost&id=<?php echo $_GET['id'] ?> " method="post" enctype="multipart/form-data">
    <div class="mur">
        <p>Choisi une image à Upload:</p>
        <input class="bouton" type="file" name="filepost">
        <br />
        <input class="post_1" type="text" name="titre" id="titre" required class="bordure" placeholder="Titre du post">
        <input class="post_2" type="text" name="publication" id="publication" required class="bordure" placeholder="Publie quelque chose...">
        <input class="bouton" type="submit" name="submitpost" value="nouveau post">
    </div>
</form>

<?php

$sql = "SELECT ecrit.id AS ecrit_id , titre, contenu, dateEcrit, image, idAuteur, idAmi, us1.id AS us1_id , us1.login AS us1_login , us1.avatar AS us1_avatar, us2.id AS us2_id, us2.login AS us2_login, us2.avatar AS us2_avatar FROM ecrit INNER JOIN user AS us1 on idAmi=us1.id  INNER JOIN user AS us2 on idAuteur=us2.id WHERE idAmi=? order by dateEcrit DESC";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));

while ($line = $q->fetch()) {

    if ($line['image'] == "") {
?>

        <div class="mur">
            <div class="post tsi">
               <div class="post1"> 
                <h3><?= $line['us2_login'] ?></h3>
                <p>le <?= $line['dateEcrit'] ?></p>
                </div> 
                <div>  
                <?php
                if ($_GET['id'] == $_SESSION['id']) {
                ?>
                    <a href='index.php?action=efface&id=<?php echo $line['ecrit_id'] ?>'> <img class="croix" src="divers/croix.png" width='30%' alt="close"> </a>
                    <?php
                } else {
                    if ($line['idAuteur'] == $_SESSION['id']) {
                    ?>
                        <a href='index.php?action=efface&id=<?php echo $line['ecrit_id'] ?>'> <img class="croix" src="divers/croix.png" width='30%' alt="close"> </a>
                <?php

                    }
                }
                ?>
                </div>
            </div>
            <div class="like si">
                <a class="pouce" href='index.php?action=aime&id=<?= $line['ecrit_id'] ?>'> <img src='divers/pouce1.png' width='30%' alt='pouce'></a>
                <p class="numero">
                    <?php
                    $likes = 0;
                    $s = "SELECT * FROM aime INNER JOIN ecrit on idEcrit=ecrit.id WHERE idEcrit=? order by dateEcrit DESC ";
                    $query = $pdo->prepare($s);
                    $query->execute(array($line['ecrit_id']));
                    while ($lines = $query->fetch()) {
                        $likes = $likes + 1;
                    };
                    echo $likes; ?>
                </p>
                     </div>
            <div class="contenus">
                <h2><?= $line['titre'] ?></h2>
                <p><?= $line['contenu'] ?></p>
            </div>
        </div>
    <?php
    } else { ?>
        <div class="mur">
            <div class="post">
                <h3><?= $line['us2_login'] ?></h3>
                <p>le <?= $line['dateEcrit'] ?></p>
                    <div class="like">
                <a class="pouce" href='index.php?action=aime&id=<?= $line['ecrit_id'] ?>'> <img src='divers/pouce1.png' width='50%' alt='pouce'></a>
                <p class="numero">
                    <?php
                    $likes = 0;
                    $s = "SELECT * FROM aime INNER JOIN ecrit on idEcrit=ecrit.id WHERE idEcrit=? order by dateEcrit DESC ";
                    $query = $pdo->prepare($s);
                    $query->execute(array($line['ecrit_id']));
                    while ($lines = $query->fetch()) {
                        $likes = $likes + 1;
                    };
                    echo $likes; ?>
                </p>
                    </div>
                <?php
                if ($_GET['id'] == $_SESSION['id']) {
                ?>
                    <a href='index.php?action=efface&id=<?php echo $line['ecrit_id'] ?>'> <img class="croix" src="divers/croix.png" width='30%' alt="close"> </a>
                    <?php
                } else {
                    if ($line['idAuteur'] == $_SESSION['id']) {
                    ?>
                    <a href='index.php?action=efface&id=<?php echo $line['ecrit_id'] ?>'> <img class="croix" src="divers/croix.png" width='10%' alt="close"> </a>
                <?php

                    }
                }
                ?>
            </div>
            <div class="postimage">
                <div class="taille"><img class="taille2" src='image/<?= $line['image'] ?>' alt='imagepost'> </div>
                <div class="contenus">
                    <h2><?= $line['titre'] ?></h2>
                    <p><?= $line['contenu'] ?></p>
                </div>
            </div>
        </div>
<?php
    };
}


?>