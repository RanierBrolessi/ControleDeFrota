<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['password']);
    header('Location: controle_frota.php');
?>