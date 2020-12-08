<?php
if (empty($_POST['sub'])) {
    ?>
<div>
    <form method="POST">
        <input type="text" name="mdp" placeholder="entrer votre mot de passe">
        <input type="submit" name="sub" value="Confirmer">
    </form>
</div>

<?php
}
$ok=false;
if(isset($_POST['sub'])){
if (isset($_POST['mdp'])) {
    $sql = "SELECT * FROM user WHERE id= ? AND mdp = PASSWORD(?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['id'], $_POST['mdp']));
    $line = $q->fetch();
    if ($line == true) {
?>
        <form method="POST" action="index.php?action=changementmdp">
            <input type="text" name="nouveaumdp" placeholder="nouveau mot de passe" required>
            <input type="text" name="confirmermdp" placeholder="confirmer mot de passe" required>
            <input type="submit" name="submit" value="Envoyer">
        </form>
<?php
        
    } else {
        $ok=false;
    }
}


if($ok==false){
    echo "<script type='text/javascript'>";
    echo "alert('false');";
    echo "</script>";
}
}







?>