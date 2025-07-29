    <div class="main">
        <section class="formula">
            <h2>
                Formulari de registre
            </h2>
            <form class="formulari" method="post" action="index.php?action=registre">
                <label for="nom">Nom complet:</label>
                <input type="text" id="nom" name="nom" required alt="nom" placeholder="Nom" maxlength="50"> <br>
                
                <label for="correu">Correu electrònic: </label>
                <input type="email" name="correu" id="correu" required alt="correu electrònic" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}" placeholder="Correu">
                <span id="errorCorreu" style="color: red;"></span> <br>
                
                <label for="contrasenya">Contrasenya: </label>
                <input type="password" name="contrasenya" id="contrasenya" required alt="contrasenya" placeholder="Contrasenya"> <br>
                
                <label for="address">Adreça: </label>
                <input type="text" id="address" name="address" required maxlength="30" alt="Adreça" placeholder="Adreça"> <br>
                
                <label for="poble">Població: </label>
                <input type="text" id="poble" name="poble" required maxlength="30" alt="Població" placeholder="Població" pattern="[a-zA-Z]+">
                <span id="errorPoblacio" style="color: red;"></span> <br>
                
                <label for="codiPostal">Codi postal: </label>
                <input type="text" id="codiPostal" name="codiPostal" required minlength="5" maxlength="5" alt="Codi Postal" placeholder="CP" pattern="\d+"> <br>
                <span id="errorCP" style="color: red;"></span>
                
                <input type="submit" id="registre" name="registre" alt="Botó de registre" value="Registrar-me"> <br>
            </form>
        </section>
    </div>
<?php  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST['nom']);
    if (empty($nom) || strlen($nom) > 50 || !preg_match("/^[\p{L}\s]+$/u", $nom)) {
        $errors['nom'] = "El nom complet no és vàlid. Només es permeten lletres i espais, màxim 50 caràcters.";
    }

    $correu = trim($_POST['correu']);
    if (!filter_var($correu, FILTER_VALIDATE_EMAIL)) {
        $errors['correu'] = "El correu electrònic no és vàlid. Segueix el format nom@domini.";
    }

    $contrasenya = trim($_POST['contrasenya']);
    if (empty($contrasenya)) {
        $errors['contrasenya'] = "La contrasenya no pot estar buida.";
    }

    $address = trim($_POST['address']);
    if (empty($address) || strlen($address) > 30) {
        $errors['address'] = "L'adreça no és vàlida. Màxim 30 caràcters.";
    }

    $poble = trim($_POST['poble']);
    if (empty($poble) || strlen($poble) > 30 || !preg_match("/^[\p{L}\s]+$/u", $poble)) {
        $errors['poble'] = "La població no és vàlida. Només es permeten lletres i espais, màxim 30 caràcters.";
    }

    $codiPostal = trim($_POST['codiPostal']);
    if (!filter_var($codiPostal, FILTER_VALIDATE_INT) || strlen($codiPostal) !== 5) {
        $errors['codiPostal'] = "El codi postal no és vàlid. Ha de contenir exactament 5 números.";
    }

    if (empty($errors)) {
        echo "Formulari enviat correctament!"; ?>
        <script>
            alert("Registrat correctament!");
            window.location.href = '/index.php?action=inici'; 
        </script>
    <?php
    } else {
        foreach ($errors as $campo => $error) {
            echo "<p style='color:red;'>Error en $campo: $error</p>";
        }
    }
}   
?>