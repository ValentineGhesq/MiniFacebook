
<form action="index.php?action=newpost&id=<?php echo $_GET['id'] ?> " method="post" >
    <div class="mur">
            Choisi une image à Upload:
        <input type="file" name="filepost">
        <input type="text" name="titre" id="titre" required class="bordure" placeholder="titre du post"> 
        <input type="text" name="publication" id="publication" required class="bordure" placeholder="Publie quelque chose..."> 
        <input type="submit" name="submit" value="nouveau post" >
    </div>
</form>
<?php

$sql = "SELECT * FROM ecrit INNER JOIN user on idAmi=user.id WHERE idAmi=? order by dateEcrit DESC ";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));

while ($line = $q->fetch()) {

    if ($line['image'] == "") {
?>

        <div class="mur">
            <div class="post">
                <h3><?= $line['login'] ?></h3>
                <p>le <?= $line['dateEcrit'] ?></p><a href='index.php?action=aime&id=<?= $line['id'] ?>'> <img src='divers/pouce1.png' width='5%' alt='pouce'></a>
                <p>
                    <?php
                    $likes = 0;
                    $s = "SELECT * FROM aime INNER JOIN ecrit on idEcrit=ecrit.id WHERE idEcrit=? order by dateEcrit DESC ";
                    $query = $pdo->prepare($s);
                    $query->execute(array($line['id']));
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
        <div>
            <div >
                <h3><?= $line['idAmi'] ?></h3>
                <p><?= $line['dateEcrit'] ?></p> <a href='index.php?action=aime&id=<?= $line['id'] ?>'> <img src='divers/pouce1.png' alt='pouce'></a>
                <p>
                    <?php
                    $likes = 0;
                    $s = "SELECT * FROM aime INNER JOIN ecrit on idEcrit=ecrit.id WHERE idEcrit=? order by dateEcrit DESC ";
                    $query = $pdo->prepare($s);
                    $query->execute(array($line['id']));
                    while ($lines = $query->fetch()) {
                        $likes = $likes + 1;
                    };
                    echo $likes; ?>
                </p>
            </div>
            <div>
                <div><img src='<?= $line['image'] ?>' alt='imagepost'> </div>
                <div>
                    <h2><?= $line['titre'] ?></h2>
                    <p><?= $line['contenu'] ?></p>
                </div>
            </div>
        </div>
<?php
    };
}

?>