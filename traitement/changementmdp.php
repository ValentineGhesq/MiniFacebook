<?php
    function prompt($prompt_msg){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }

    
    $prompt_msg = "Nouveau mot de passe";
    $prompt_msg2 = "confirmez mot de passe";

?>
<script> if ( window.confirm( 'Voulez vous vraiment changer de mot de passe ?' ) ) {
   <?php 
    $newmdp= prompt($prompt_msg);
     $confirmmdp= prompt($prompt_msg2);

    if($newmdp == $confirmmdp){
        $sql = "UPDATE user SET mdp=PASSWORD(?) WHERE id = ?";
        $query= $pdo->prepare($sql);
        $query->execute( array($newmdp, $_SESSION['id'])); 
    }else{
        echo "alert('mauvais mot de passe')";
    };
    
?> } 
</script>
