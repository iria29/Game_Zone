<?php

    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/productes.php';

    $productes = buscarProductes((string)($_GET['search']));

    require_once __DIR__.'/../view/v_resultats.php';

?>