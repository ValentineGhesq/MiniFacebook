<div>
    <h1>Profil</h1>
</div>

<div class="tout">
    <div>
        <div>
            <?php
              $sql2 = "SELECT * FROM user WHERE id=?";
             $query = $pdo->prepare($sql2);
             $query->execute(array($_SESSION['id']));
             $line2 = $query->fetch() ;
             if($line2['avatar']==""){
                ?>
                <form action="index.php?action=upload&id=<?php echo $line2['id'] ?> " method="post" enctype="multipart/form-data">
                     Choisi un avatar à Upload:
                     <input type="file" name="file">
                     <input type="submit" name="submit" value="Upload">
                </form>
                <?php
             }else{
                 ?>
                 <img width='10%' src='avatar/<?php echo $line2['avatar']?>' alt='avatar'>
                    <form action="index.php?action=upload&id=<?php echo $line2['id'] ?>" method="post" enctype="multipart/form-data">
                     Changer d'avatar:
                     <input type="file" name="file">
                     <input type="submit" name="submit" value="Upload">
                </form>
                 <?php
             }
            ?>
        </div>
        <div>
            <?php $sql = "SELECT * FROM user WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_SESSION['id']));
            $line = $q->fetch() ?>
            <h3>login : <?php echo $_SESSION['login']; ?> </h3>
            <h3> mail : <?php echo $line['email']; ?></h3>
            <form method="POST" action="index.php?action=changermdp">
                <input type='submit' name="changerlemotdepasse" value="changer le mot de passe">
            </form>
        </div>

        <div>

        </div>
    </div>
    <div>
        <h2>Mes amis</h2>
        <?php
        $sql = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='ami' AND idUTilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='ami' AND idUTilisateur1=?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id'], $_SESSION['id']));
        while ($l = $q->fetch()) {
            ?>
            <ul>
            <?php
            if($l['avatar']==""){
                echo "<li>" . $l['login'] . "</li>";
            }else{
        ?>
                <?php echo "<li> <img width='1%' src='avatar/". $l['avatar']."' alt='avatar'>" . $l['login'] . "</li>"; ?>
            
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
            <?php include('traitement/demande.php') ?>
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
            <input type="text" name="recherche" placeholder="recherche des amis">
            <input type="submit" name="sub" value="recherche">
            <?php include('traitement/recherche.php') ?>


        </form>


    </div>
</div>