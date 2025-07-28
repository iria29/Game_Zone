<?php
    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/comandes.php';

    require_once __DIR__.'/../model/productes.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') { // Comprovem si s'ha fet un formulari
        if(isset($_POST['llistatComandes'])) {
            // Redireccionem a la pàgina on sortirà totes les comandes fetes per l'usuari
            header("Location: /index.php?action=llistat");
            exit;
        }
        elseif (isset($_POST['tornarCarret'])) {
            // Redireccionem a la pàgina del carret
            header("Location: /index.php?action=carret");
            exit;
        }
    }

    // Si ha sigut possile fer la compra, buidem el carret i modifiquem el total
    if(ferCompra())  {
        unset($_SESSION["producte"]);
        $_SESSION["total"] = 0;
        header("Location: /index.php?action=confirmar&possible=1");
    }

    require_once __DIR__.'/../view/v_confirmar_compra.php';
?>