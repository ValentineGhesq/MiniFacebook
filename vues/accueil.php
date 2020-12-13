<div>
    <h1>Profil</h1>
</div>

<div class="tout">
    <div class="moi">
        <div>
            <?php
            $sql2 = "SELECT * FROM user WHERE id=?";
            $query = $pdo->prepare($sql2);
            $query->execute(array($_SESSION['id']));
            $line2 = $query->fetch();
            if ($line2['avatar'] == "") {
            ?>
                <form action="index.php?action=upload&id=<?php echo $line2['id'] ?>" method="post" enctype="multipart/form-data">
                    Choisi un avatar à Upload:
                    <input class="bouton" type="file" name="file">
                    <input class="bouton" type="submit" name="submit" value="Upload">
                </form>
            <?php
            } else {
            ?>
                <img width='10%' src='avatar/<?php echo $line2['avatar'] ?>' alt='avatar'>
                <form action="index.php?action=upload&id=<?php echo $line2['id'] ?>" method="post" enctype="multipart/form-data">
                    Changer d'avatar:
                    <input class="bouton1" type="file" name="file">
                    <input class="bouton1" type="submit" name="submit" value="Upload">
                </form>
            <?php
            }
            ?>
        </div>
        <div class="perso">
            <?php $sql = "SELECT * FROM user WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_SESSION['id']));
            $line = $q->fetch() ?>
            <h3>login : <?php echo $_SESSION['login']; ?> </h3>
            <h3> mail : <?php echo $line['email']; ?></h3>
            <form method="POST">
                <input class="bouton1" type='submit' name="changerlemotdepasse" value="changer le mot de passe">
            </form>
            <?php
            $ok = true;
            if (isset($_POST['changerlemotdepasse'])) {

                if (empty($_POST['sub'])) {
            ?>
                    <div>
                        <form class="bouton2" method="POST">
                            <input class="champ" type="password" name="mdp" placeholder="entrer votre mot de passe">
                            <input class="bouton1" type="submit" name="sub" value="Confirmer">
                        </form>
                    </div>

                    <?php
                }
            }
            if (isset($_POST['sub'])) {
                if (isset($_POST['mdp'])) {
                    $sql = "SELECT * FROM user WHERE id= ? AND mdp = PASSWORD(?)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_SESSION['id'], $_POST['mdp']));
                    $line = $q->fetch();
                    if ($line == true) {
                    ?>
                        <form class="bouton2" method="POST">
                            <input type="password" name="nouveaumdp" placeholder="nouveau mot de passe" required>
                            <input type="password" name="confirmermdp" placeholder="confirmer mot de passe" required>
                            <input class="bouton1" type="submit" name="changemdp" value="Envoyer">
                        </form>

                    <?php
                        $ok = true;
                    } else {
                        $ok = false;
                    };
                };
            };

            if ($ok == false) {
                echo "<script type='text/javascript'>";
                echo "alert('Mauvais mot de passe');";
                echo "</script>";
            }

            if (isset($_POST['changemdp'])) {
                if ($_POST['nouveaumdp'] == $_POST['confirmermdp']) {
                    $sql2 = "UPDATE user set mdp=PASSWORD(?) WHERE id=? ";
                    $query = $pdo->prepare($sql2);
                    $query->execute(array($_POST['nouveaumdp'], $_SESSION['id']));
                    ?>
                    <script type='text/javascript'>
                        alert('mot de passe changé');
                    </script>
            <?php

                } else {
                    echo "different mot de passe";
                }
            }


            ?>
        </div>

        <div>

        </div>
    </div>
    <div class="mesamis">
        <h2>Mes amis</h2>
        <?php
        $sql = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='ami' AND idUTilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='ami' AND idUTilisateur1=?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id'], $_SESSION['id']));
        while ($l = $q->fetch()) {
        ?>
            <ul>
                <?php
                if ($l['avatar'] == "") {
                ?>
                    <li><a href="index.php?action=mur&id=<?= $l['id'] ?>"> <?php echo $l['login'] ?> </a></li>

                <?php
                } else {
                ?>
                    <li> <img class="profil" width='10%' src='avatar/<?= $l['avatar'] ?>' alt='avatar'> <a href="index.php?action=mur&id=<?= $l['id'] ?>"> <?php echo $l['login'] ?> </a></li>

                <?php
                }
                ?>
                <ul>
                <?php



            }
                ?>
    </div>
</div>
<div class="carre">
    <div class="attente">
        <h4>En attente</h4>
        <div>
            <ul>
                <?php include('traitement/demande.php') ?>
            </ul>
        </div>
    </div>

    <div class="amis">
        <h4>Demandes d'amis reçues</h4>
        <div>
            <?php include('traitement/attente.php') ?>
        </div>
    </div>

    <div class="recherche">
        <h4>Rechercher des amis</h4>
        <form method="POST">
            <input class="rechbout" type="text" name="recherche" placeholder="recherche des amis">
            <input class="bouton" type="submit" name="sub" value="recherche">
        </form>
        <?php include('traitement/recherche.php') ?>


    </div>
</div>