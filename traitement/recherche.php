<?php

$sql = "SELECT * FROM user WHERE id NOT IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id  AND idUTilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id  AND idUTilisateur1=?)";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id'], $_SESSION['id']));
while ($line = $query->fetch()) {
    if (isset($_POST['recherche'])) {
        $recherche = $_POST['recherche'];
        if ((strstr($line['login'], $recherche) == TRUE)) {
?>
            
                <?php
                    echo $line['login'];
                ?>
        
            <a href="index.php?action=newami&id=<?php echo $line['id'] ?>" > demander en ami </a>
<?php
        };
    }
}

?>