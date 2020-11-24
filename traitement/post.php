<?php

$sql = "SELECT * FROM ecrit INNER JOIN user on idAmi=user.id WHERE idAmi=? order by dateEcrit DESC ";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));

while ($line = $q->fetch()) {

    if ($line['image'] == "") {
?>
        <div>
            <div>
                <h3><?= $line['login'] ?></h3>
                <p><?= $line['dateEcrit'] ?></p><a href='index.php?action=aime&id=<?= $line['id'] ?>'> <img src='divers/pouce1.png' width='5%' alt='pouce'></a>
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
                <h2><?= $line['titre'] ?></h2>
                <p><?= $line['contenu'] ?></p>
            </div>
        </div>
    <?php
    } else { ?>
        <div>
            <div>
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