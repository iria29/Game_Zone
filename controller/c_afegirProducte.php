<?php
    // Iniciem la sessió de les cookies 
    session_start();
    
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/productes.php';

    if($_SESSION['login'] == true) {
        // Agafem la ID del producte a afegir al carret
        $prodId = $_GET["producteId"];
        $quantitat = intval($_GET["quantitat"]);
        /* Busquem si ja haviem afegit algun producte d'aquest */
        $trobat = false;
        $iterator = 0;
        foreach($_SESSION["producte"] as $prod) {
            if($prod[0] == $prodId) {
                $trobat = true;
                break;
            }
            $iterator = $iterator + 1;
        }

        if(!$trobat) { // Si no s'ha afegit aquest producte, l'afegim
            $_SESSION["producte"][] = [$prodId, intval($_GET["quantitat"])];
        }
        else { // Si ja haviem posat al carret aquest producte, augmentem la quantitat
            $_SESSION["producte"][$iterator][1] = $_SESSION["producte"][$iterator][1] + intval($_GET["quantitat"]);
        }
    }
    
?>