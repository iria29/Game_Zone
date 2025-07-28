<?php

    function comprovarDades(string $email, string $password) : bool {
        // Connexió a la BD
        $conn = getConn();

        // SQL per obtenir la contrasenya
        $sql = "SELECT contrasenya FROM usuari WHERE mail= $1;";

        // Fem la consulta
        $res = pg_query_params($conn, $sql, [$email]);

        if(pg_num_rows($res) === 0) {
            return false;
        }

        // Obtenim tots els resultats
        $row = pg_fetch_assoc($res);

        // Guardem la contrasenya xifrada de la BD
        $hash = $row['contrasenya'];
        
        // Tanquem la connexió
        pg_close($conn);

        return password_verify($password, $hash);
    }

?>