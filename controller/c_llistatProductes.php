<?php
    session_start();
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/productes.php';

    require_once __DIR__.'/../model/categories.php';

    // Agafem el valor del paràmetre de la ID de producte
    $categoryId = intval($_GET['category_id']);

    // Fem una consulta per obtenir tots els productes de la base de dades amb aquesta categoria
    $productes = getProductesByCategory($categoryId);

    // Consulta per obtenir informació de la categoria (nom i foto)
    $categoryInfo = getCategoryInfo($categoryId);

    require_once __DIR__.'/../view/v_llistatProductes.php';

?>