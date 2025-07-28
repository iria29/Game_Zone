<?php

function getUsuariByMail(string $correu) {
    // Connexió a la BD
    $conn = getConn();

    // Prepara la consulta SQL
    $sql = "SELECT * 
            FROM usuari
            WHERE usuari.mail = $1";

    $res = pg_query_params($conn, $sql, [$correu]);

    $info = pg_fetch_all($res);

    //Tanquem la connexió
    pg_close($conn);

    return $info;
}

function actualitzarPerfil(string $correu, string $nom, string $direccio, string $poble, 
                                   string $cp, ?string $img = null) : bool {
    $conn = getConn();

    // Construir la consulta SQL dinàmica segons si s'inclou una imatge o no
    if ($img !== null) {
        $sql = "UPDATE usuari 
                SET nom = $1, 
                    direccio = $2, 
                    poble = $3, 
                    cp = $4, 
                    imatge = $5
                WHERE mail = $6";

        $params = [$nom, $direccio, $poble, $cp, $img, $correu];
    } else {
        $sql = "UPDATE usuari 
                SET nom = $1, 
                    direccio = $2, 
                    poble = $3, 
                    cp = $4
                WHERE mail = $5";

        $params = [$nom, $direccio, $poble, $cp, $correu];
    }

    // Executa la consulta amb paràmetres
    $res = pg_query_params($conn, $sql, $params);

    // Tanca la connexió
    pg_close($conn);

    return $res != false;
}

function comprovaImatgeCorrecta($ext) {

    $uploadOk = 1;

    if(!getimagesize($_FILES["imatge_perfil"]["tmp_name"])) {
        echo "El fitxer no és una imatge.";
        $uploadOk = 0;
    }

    // Comprovar mida màxima (500KB)
    if ($_FILES["imatge_perfil"]["size"] > 2000000) {
        echo "El fitxer és massa gran.";
        $uploadOk = 0;
    }

    // Formats permesos
    if(!in_array($ext, ["jpg", "jpeg", "png"])) {
        echo "Només es permeten JPG, JPEG o PNG.";
        $uploadOk = 0;
    }

    return $uploadOk;
}

?>