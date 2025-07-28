<?php
    // Iniciem la sessió de les cookies 
    session_start();

    // Guardem a una variable si l'usuari ha fet login o no
    $logejat = $_SESSION["login"];

    require_once __DIR__.'/../view/v_menuDesplegable.php';

?>