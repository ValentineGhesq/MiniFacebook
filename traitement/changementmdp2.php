<?php
if (isset($_POST['nouveaumdp'])) {
    if ($_POST['nouveaumdp'] == $_POST['confirmermdp']) {
        $sql2 = "UPDATE user set mdp=PASSWORD(?) WHERE id=? ";
        $query = $pdo->prepare($sql2);
        $query->execute(array($_POST['nouveaumdp'], $_SESSION['id']));
        echo "<script type='text/javascript'>";
        echo "alert('mot de passe changé');";
        echo "</script>";
        header("location: index.php?action=accueil");
        
    }else{
        echo "different mot de passe";
    }
}
?>