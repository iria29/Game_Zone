<?php 
    session_start();
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/productes.php';

    $productes = [];
    
    // Per cada producte del cistell, agafem la seva informació del carret
    foreach($_SESSION["producte"] as $productId) {
        $product = getProductesById($productId[0]);
        $productes[] = [$product[0], $productId[1]];
    }

    require_once __DIR__.'/../view/v_footer.php';
?>