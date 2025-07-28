<?php
function formulari() {
    // Comprovem si s'ha enviat el formulari
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registre'])) {
        
        // Obtenim les dades del formulari
        $nom = $_POST['nom'];
        $correu = $_POST['correu'];
        $contrasenya = $_POST['contrasenya'];
        $direccio = $_POST['address'];
        $poble = $_POST['poble'];
        $cp = $_POST['codiPostal'];

        // Cridem a la funció que guarda les dades a la BD
        registre($correu, $contrasenya, $nom, $direccio, $poble, $cp);
        
        $mensaje = "Registre realitzar amb èxit!!";
    } else {
        $mensaje = "";
    }
}
   

function registre(string $correu, string $contrasenya, string $nom, string $direccio, string $poble, string $cp) {
    // Connexió a la BD
    $conn = getConn();

    //Xifrem la contrasenya
    $hashedPassword = password_hash($contrasenya, PASSWORD_DEFAULT);

    //Creem id random de 32 caràcters
    $id = bin2hex(random_bytes(16));

    // Prepara la consulta SQL
    $sql = "INSERT INTO usuari(nom, mail, contrasenya, direccio, poble, cp, id)
            VALUES ($1, $2, $3, $4, $5, $6, $7)";

    //Preparem els parametres de la consulta
    $parametres = array($nom, $correu, $hashedPassword, $direccio, $poble, $cp, $id);        

    //Realitzem la consulta
    $result = pg_query_params($conn, $sql, $parametres);
    
    //Tanquem la connexio a la BD
    pg_close($conn);
}

// Funció per comprovar si el correu ja existeix
function existeixCorreu($correu) {
    $conn = getConn();
    $sql = "SELECT 1 FROM usuari WHERE mail = $1";
    $result = pg_query_params($conn, $sql, [$correu]);
    $existeix = pg_num_rows($result) > 0; // Comprova si hi ha alguna fila amb aquest correu
    pg_close($conn);
    return $existeix;
}
?>


