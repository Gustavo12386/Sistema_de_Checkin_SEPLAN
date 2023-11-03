<?php
    session_start();   
    // realiza o logout
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header("location: login.php");
?>