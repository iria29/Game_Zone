<?php

function getProductesByCategory(int $categoryId) : array {
    // Connexió a la BD
    $conn = getConn();

    if($categoryId == 0) {
        // SQL per obtenir els productes
        $sql = "SELECT * FROM producte ORDER BY producte.name;";
    }
    else {
        // SQL per obtenir els productes de la categoria
        $sql = "SELECT * FROM producte WHERE producte.id_categoria = " . $categoryId . " ORDER BY producte.name;";
    }

    // Fem la consulta
    $res = pg_query($conn, $sql);

    // Obtenim tots els resultats
    $files = pg_fetch_all($res);

    //Tanquem la connexió
    pg_close($conn);

    // Devolver los resultados
    return $files;
}

function getProductesById(int $producteId) : array {
    // Conectar a la base de datos
    $conn = getConn();

    //Preparem la consulta
    $sql = "SELECT * FROM producte WHERE producte.id = " . $producteId . " ORDER BY producte.id;";

    // Fem la consulta
    $res = pg_query($conn, $sql);

    // Obtenim tots els resultats
    $info = pg_fetch_all($res);

    //Tanquem la connexió
    pg_close($conn);

    return $info;
}

function getProductesByIdWithConn(int $producteId) : array {
    // Conectar a la base de datos
    $conn = getConn();
    
    //Preparem la consulta
    $sql = "SELECT * FROM producte WHERE producte.id = " . $producteId . " ORDER BY producte.id;";

    // Fem la consulta
    $res = pg_query($conn, $sql);

    // Obtenim tots els resultats
    $info = pg_fetch_all($res);

    return $info;
}

function buscarProductes(string $busqueda) : array {
    // Conectar a la base de datos
    $conn = getConn();

    //Preparem la consulta
    $sql = "SELECT * FROM producte WHERE LOWER(producte.name) LIKE LOWER('%" . $busqueda . "%') ORDER BY producte.id;";

    // Fem la consulta
    $res = pg_query($conn, $sql);

    // Obtenim tots els resultats
    $info = pg_fetch_all($res);

    //Tanquem la connexió
    pg_close($conn);

    return $info;
}

function afegirProducteALinia(int $prodId, string $idUser, string $idComanda, int $quantitat): bool {

    $conn = getConn();
    $sql = "
        SELECT quantitat 
        FROM linia_comanda lc, comanda c, usuari u
        WHERE lc.id_comanda = c.id
        AND u.mail = c.mail_usuari
        AND lc.id_producte = $1 AND c.id = $2 AND u.id = $3; ";

    $res = pg_query_params($conn, $sql, [$prodId, $idComanda, $idUser]);
    $row = (pg_num_rows($res) > 0) ? pg_fetch_assoc($res) : null;

    if ($row) {
        $novaQuantitat = $row['quantitat'] + $quantitat;
        $sqlIncrement = "
            UPDATE linia_comanda
            SET quantitat = $1
            WHERE id_producte = $2 AND id_comanda = $3; ";
        $result = pg_query_params($conn, $sqlIncrement, [$novaQuantitat, $prodId, $idComanda]);
    } else {
        // Si no existeix, inserim una nova línia de comanda
        $insertSql = "
            INSERT INTO linia_comanda (id_comanda, id_producte, nom, quantitat, preu, img_prod)
            SELECT $1, id, nom, $2, preu, img_prod
            FROM producte
            WHERE id = $3; ";
        $result = pg_query_params($conn, $insertSql, [$idComanda, $quantitat, $prodId]);
    }

    pg_close($conn);
    return $result !== false;
}


?>