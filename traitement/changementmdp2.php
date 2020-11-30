<?php
if (isset($_POST['nouveaumdp'])) {
    if ($_POST['nouveaumdp'] == $_POST['confirmermdp']) {
        $sql2 = "UPDATE user set mdp=PASSWORD(?) WHERE id=? ";
        $query = $pdo->prepare($sql2);
        $query->execute(array($_POST['nouveaumdp'], $_SESSION['id']));
        
    
        header("location: index.php?action=accueil");
        ?>
        <script type='text/javascript'>
             alert('mot de passe changé');
        </script>
        <?php
        
    }else{
        echo "different mot de passe";
    }
}
?>