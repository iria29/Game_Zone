<?php
    session_start();
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/productes.php';

    // Agafem el valor del paràmetre de la ID de producte
    $producteId = intval($_GET['producteId']);

    // Fem la consulta per rebre els detalls del producte
    $infoProducte = getProductesById($producteId);

    require_once __DIR__.'/../view/v_detallsProducte.php';

?>