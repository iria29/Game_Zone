<?php

    require_once __DIR__.'/../model/connectaDb.php';

    require_once __DIR__.'/../model/registreUsuari.php';

    $errors = []; 

    // Comprovem si s'ha enviat el formulari
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registre'])) {

        $correu = filter_var($_POST['correu'], FILTER_SANITIZE_EMAIL);
        
        // Comprovar si el correu ja existeix
        if (existeixCorreu($correu)) {
            $errors['correu'] = "Aquest correu electrònic ja està registrat.";
        } else {
            // Obtenim les dades del formulari 
            $nom = $_POST['nom'];
            $contrasenya = $_POST['contrasenya'];
            $direccio = $_POST['address'];
            $poble = $_POST['poble'];
            $cp = $_POST['codiPostal'];

            // Cridem a la funció que guarda les dades a la BD
            registre($correu, $contrasenya, $nom, $direccio, $poble, $cp);   
            $_SESSION["comanda"] = 1;
        }
    } 

    require_once __DIR__.'/../view/v_registreUsuari.php';
        
?>
