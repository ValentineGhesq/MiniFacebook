

<div><h1>Profil</h1></div>

<div>
<?php  $sql = "SELECT * FROM user WHERE id=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['id']));
    $line=$q->fetch() ?>
    <h3>login : <?php echo $_SESSION['login'];?> </h3>
    <h3> mail : <?php echo $line['email'];?></h3>
    <form method="POST">
     <input type='submit' name="changerlemotdepasse" value="changer le mot de passe">
     </form>
</div>

<div>

</div>
    <h2>Mes amis</h2>
   <?php 
   $sql = "SELECT * FROM user";
    $q = $pdo->prepare($sql);
    $q->execute();
    while($line=$q->fetch()) {
        $sql = "SELECT * FROM lien WHERE etat='ami'
        AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
        $q = $pdo->prepare($sql);
        $q->execute(array($line['id'],$_SESSION['id'],$_SESSION['id'],$line['id']));
         while($l=$q->fetch()) {
                echo $line['login'];

}
}
            ?>
<div>
    <h3>En attente</h3>
    <div>
    
    </div>
</div>

<div>
    <h3>Demandes d'amis reçues</h3>
    <div>
    <?php include('traitement/attente.php') ?>
    </div>
</div>

<div>
    <h3>Rechercher des amis</h3>
    <form method="POST">
        <input type="text" name="recherche" placeholder="recherche des amis">
        <input type="submit" name="sub" value="recherche">
        <?php include('traitement/recherche.php')?>
        
    
    </form>

    
</div>