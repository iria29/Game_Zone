<?php
session_start(); 

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/usuaris.php';
require_once __DIR__.'/../model/login.php';

$usuari = getUsuariByMail($_SESSION["correu"]);
$actualitzacio = false;

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["correu"])) {

    $correu = $_POST['correu'];
    $password = $_POST['contrasenya'];
    $uploadPath = null;
    $nomNou = null;

    if(comprovarDades($correu, $password)) {
        $nom = $_POST['nom'];
        $direccio = $_POST['address'];
        $poble = $_POST['poble'];
        $cp = $_POST['codiPostal'];

        //IMATGE
        if (isset($_FILES["imatge_perfil"]) && is_uploaded_file($_FILES['imatge_perfil']['tmp_name']) && $_FILES['imatge_perfil']['error'] === UPLOAD_ERR_OK) {
            
            $destinationPath = '/home/TDIW/tdiw-l1/public_html/uploadedFiles/';
            $uploadOk = 1;

            // Nom sense caràcters especials
            $nomImg = preg_replace('/[^A-Za-z0-9.\-_]/', '', $_FILES['imatge_perfil']['name']);
            $extensio = strtolower(pathinfo($nomImg, PATHINFO_EXTENSION));

            // Comprovar si és una imatge
            $uploadOk = comprovaImatgeCorrecta($extensio);

            // Si tot és correcte, moure el fitxer
            if($uploadOk) {
                $stringAleatori = bin2hex(random_bytes(8)); // Genera un string aleatori de llargada 16
                $nomNou = pathinfo($nomImg, PATHINFO_FILENAME) . "_$stringAleatori.$extensio";

                // Ruta completa de la imatge
                $uploadPath = $destinationPath . $nomNou;
            
                if (move_uploaded_file($_FILES['imatge_perfil']['tmp_name'], $uploadPath)) {
                    echo "Fitxer pujat correctament com a $nomNou.";
                } else {
                    echo "Error en pujar el fitxer.";
                }
            }
              
        } else {
            echo "No s'ha seleccionat cap fitxer.";
        }

        $actualitzacio = actualitzarPerfil($correu, $nom, $direccio, $poble, $cp, $nomNou);
    }
            
}

require_once __DIR__.'/../view/v_perfil.php';

?>