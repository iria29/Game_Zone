<?php

function getCategories() : array
{
    // Connexió a la BD
    $conn = getConn();

    // SQL per obtenir les categories amb aquest id
    $sql = "SELECT * FROM categoria ORDER BY categoria.id;";

    // Fem la consulta
    $res = pg_query($conn, $sql);

    // Obtenim tots els resultats
    $files = pg_fetch_all($res);

    // Tanquem la connexió
    pg_close($conn);

    return $files;
}

function getCategoryInfo(int $categoryId) : array
{
    // Connexió a la BD
    $conn = getConn();

    // SQL per obtenir les categories
    $sql = "SELECT *  
    FROM categoria 
    WHERE categoria.id = " . $categoryId . " ORDER BY categoria.name;";

    // Fem la consulta
    $res = pg_query($conn, $sql);

    // Obtenim tots els resultats
    $categoria = pg_fetch_all($res);
    
    // Tanquem la connexió
    pg_close($conn);
    
    return $categoria;
}

?>