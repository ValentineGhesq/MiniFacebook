<?php
    $sql = "DELETE FROM ecrit WHERE id=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id']));
    
    header("location:" .  $_SERVER['HTTP_REFERER']);
?>