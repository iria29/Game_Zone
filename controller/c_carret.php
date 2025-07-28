<?php
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/productes.php';

    $productes = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST') { // Comprovem si s'ha fet un formulari
        if(isset($_POST['buidarCistell'])) {
            // Buidem la llista de productes afegits a la cistella
            unset($_SESSION["producte"]);
        }
        elseif (isset($_POST['comprarProd'])) {
            // Redireccionem a la pàgina de confirmar compra
            header("Location: /index.php?action=confirmar");
            exit;
        }
        elseif (isset($_POST['eliminarCistell'])) {
            // Agafem el valor del boto eliminarCistell, la id del producte
            $id = $_POST['eliminarCistell'];
            $iterator = 0;
            foreach($_SESSION["producte"] as $producte) {
                if($producte[0] == $id) {
                    // Quan trobem la id del producte a eliminar, el treiem de la llista de la Sessió
                    unset($_SESSION["producte"][$iterator]);
                    break;
                }
                $iterator = $iterator + 1;
            }
        }
        elseif (isset($_POST['incrementarProd'])) {
            $id = $_POST['incrementarProd'];
            $iterator = 0;
            foreach($_SESSION["producte"] as $producte) {
                if($producte[0] == $id) {
                    // Quan trobem la id del producte a incrementar la quantitat, modifiquem la quantitat
                    $_SESSION["producte"][$iterator][1] = $_SESSION["producte"][$iterator][1] + 1;
                    break;
                }
                $iterator = $iterator + 1;
            }
        }
        elseif (isset($_POST['decrementarProd'])) {
            $id = $_POST['decrementarProd'];
            $iterator = 0;
            foreach($_SESSION["producte"] as $producte) {
                if($producte[0] == $id) {
                    // Quan trobem la id del producte a decrementar la quantitat, mirem si s'ha d'eliminar del carret o no
                    if($_SESSION["producte"][$iterator][1] == 1) {
                        unset($_SESSION["producte"][$iterator]);
                    }
                    else {
                        $_SESSION["producte"][$iterator][1] = $_SESSION["producte"][$iterator][1] - 1;
                    }
                    break;
                }
                $iterator = $iterator + 1;
            }
        }
        
        header("Location: /index.php?action=carret");
        exit;
    }
    else {
        // Per cada producte del cistell, agafem la seva informació del carret
        foreach($_SESSION["producte"] as $productId) {
            $product = getProductesById($productId[0]);
            $productes[] = [$product[0], $productId[1]];
        }
    }

    require_once __DIR__.'/../view/v_carret.php';
?>