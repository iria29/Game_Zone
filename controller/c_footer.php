<?php 
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/productes.php';

    $products = [];
    
    // Por cada producto de la cesta, añadimos su información al carrito
    if (!empty($_SESSION["producte"])) {
        foreach($_SESSION["producte"] as $productId) {
            $product = getProductesById($productId[0]);
            $products[] = [$product[0], $productId[1]];
        }
    }
    
    require_once __DIR__.'/../view/v_footer.php';
?>