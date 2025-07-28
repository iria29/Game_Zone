<?php 

function getLlistatComandes() : array {
    // Connexió a la BD
    $conn = getConn();

    // Preparem la consulta
    $sql = "SELECT * FROM comanda WHERE mail_usuari=$1;";

    // Fem la consulta
    $res = pg_query_params($conn, $sql, [$_SESSION["correu"]]);

    // Obtenim els resultats de la consulta
    $comandes = pg_fetch_all($res);

    $llistat = [];
    foreach($comandes as $comanda) {
        $sql = "SELECT * FROM comanda, linia_comanda WHERE comanda.id = linia_comanda.id_comanda AND linia_comanda.id_comanda=$1;";

        // Fem la consulta
        $res = pg_query_params($conn, $sql, [$comanda['id']]); 
        
        // Obtenim els resultats de la consulta en una llista
        $llistat[] = pg_fetch_all($res);     
    }

    // Tanquem la connexió
    pg_close($conn);
    
    return $llistat;
}


function ferCompra() : bool {
    // Si esta buit el carret no podem fer la compra
    if(empty($_SESSION["producte"])) {
        return false;
    }

    // Connexió a la BD
    $conn = getConn();

    $sqlComanda = "INSERT INTO comanda(total, mail_usuari, data_compra, hora_compra) VALUES ($1, $2, $3, $4) RETURNING id";

    //Realitzem la consulta
    $resultat = pg_query_params($conn, $sqlComanda, [$_SESSION["total"], $_SESSION["correu"], date('d/m/Y'), date('H:i:s')]);

    // Obtenim els resultats
    $comandaId = pg_fetch_result($resultat, 0, 'id');

    foreach($_SESSION["producte"] as $productId) {
        // Fem la consulta per rebre els detalls del producte
        $infoProducte = getProductesByIdWithConn($productId[0]);
        
        $sql = "INSERT INTO linia_comanda(nom, id_producte, quantitat, preu, id_comanda, img_prod)
            VALUES ($1, $2, $3, $4, $5, $6)";

        //Preparem els parametres de la consulta
        $parametres = array($infoProducte[0]['name'], $infoProducte[0]['id'], $productId[1], $infoProducte[0]['preu'], $comandaId, $infoProducte[0]['imgGran']);

        //Realitzem la consulta
        $resultat = pg_query_params($conn, $sql, $parametres);
    }

    //Tanquem la connexio a la BD
    pg_close($conn);

    return true;
}

?>