<?php

$sql = "SELECT * FROM user WHERE id NOT IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id  AND idUTilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id  AND idUTilisateur1=?)";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id'], $_SESSION['id']));
while ($line = $query->fetch()) {
    if (isset($_POST['recherche'])) {
        $recherche = $_POST['recherche'];
        if ((strstr($line['login'], $recherche) == TRUE)) {
?>
            <form action="index.php?action=newami&id=<?php echo $line['id'] ?>" method="GET">
                <?php
                    echo $line['login'];
                ?>
                 <input type="submit" value="demander en ami">
            </form>
<?php
        };
    }
}

?>