<div class="main">
    <section class="formula">
        <h2> 
            El meu perfil
        </h2> 
        <br>
        <?php 
            $filesPublicPath = 'uploadedFiles/';
            $img = !empty($usuari[0]['imatge']) ? $filesPublicPath.$usuari[0]['imatge'] : '/resources/img/headerAndFooter/perfil.png';
        ?>
        <img src="<?php echo $img ?>" alt="<?php echo $usuari[0]["nom"] ?>" width="100px">

        <form class="formulari" method="post" enctype="multipart/form-data" action="/index.php?action=perfil">
            <label for="correu">Correu electrònic: </label>
            <input readonly type="email" name="correu" id="correu" required alt="correu electrònic" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}" value="<?php echo $usuari[0]["mail"] ?>">
            <span id="errorCorreu" style="color: red;"></span> <br>

            <label for="nom">Nom complet:</label>
            <input type="text" id="nom" name="nom" required alt="nom" value="<?php echo $usuari[0]["nom"] ?>" maxlength="50"> <br>

            <label for="address">Adreça: </label>
            <input type="text" id="address" name="address" required maxlength="30" alt="Adreça" value="<?php echo $usuari[0]["direccio"] ?>"> <br>
            
            <label for="poble">Població: </label>
            <input type="text" id="poble" name="poble" required maxlength="30" alt="Població" value="<?php echo $usuari[0]["poble"] ?>" pattern="[a-zA-Z]+">
            <span id="errorPoblacio" style="color: red;"></span> <br>
            
            <label for="codiPostal">Codi postal: </label>
            <input type="text" id="codiPostal" name="codiPostal" required minlength="5" maxlength="5" alt="Codi Postal" value="<?php echo $usuari[0]["cp"] ?>" pattern="\d+"> <br>
            <span id="errorCP" style="color: red;"></span> <br>
            
            <label for="img_perfil"> Puja una imatge: </label>
            <input type="file" id="img_perfil" name="imatge_perfil"/> <br>
            
            <label for="contrasenya">Introdueix contrasenya per confirmar: </label>
            <input type="password" name="contrasenya" id="contrasenya" required alt="contrasenya" placeholder="Contrasenya"> <br>
            
            <input type="submit" id="modificar" name="modificar" alt="Botó per modificar perfil" value="Modificar dades"> <br>
        </form>
    </section>
</div>
<?php  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = []; 

    $nom = trim($_POST['nom']);
    if (empty($nom) || strlen($nom) > 50 || !preg_match("/^[\p{L}\s]+$/u", $nom)) {
        $errors['nom'] = "El nom complet no és vàlid. Només es permeten lletres i espais, màxim 50 caràcters.";
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

    if (empty($errors) && $actualitzacio) { ?>
        <script>
            alert("S'han modificat les dades correctament!");
            window.location.href = '/index.php?action=inici'; 
        </script>
    <?php
    } else {
        foreach ($errors as $campo => $error) {
            echo "<p style='color:red;'>Error en $campo: $error</p>";
        }

        ?>
        <script>
            alert("No s'han pogut modificar les dades.<?php ?>");
        </script>
    <?php }
}   
?>