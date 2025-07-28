<?php 
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/comandes.php';
    
    $comandes = getLlistatComandes();

    require_once __DIR__.'/../view/v_llista_comandes.php';
?>