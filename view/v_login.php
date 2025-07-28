<?php

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if (comprovarDades($_POST['correu'], $_POST['contrasenya'])) {
        
        $_SESSION["login"] = true;
        //$_SESSION["id"] = getId($_POST['correu']);  
        $_SESSION["correu"] = $_POST['correu'];

        echo "<script>
                alert('Has iniciat sessió correctament');
                window.location.href = '/index.php?action=inici';
              </script>";
    } else {
        $error = "El correu o la contrasenya estan malament. Torna a provar.";
    }
}
?>

<div class="main">
    <section class="formula">
        <h2>Iniciar sessió</h2>
        <form action="/index.php?action=login" class="formulari" method="post">
            <label for="correu">Correu electrònic: </label>
            <input type="email" name="correu" id="correu" required alt="correu electrònic" placeholder="Correu"
                   value="<?php echo htmlspecialchars($_POST['correu'] ?? ''); ?>"> <br>
            <label for="contrasenya">Contrasenya: </label>
            <input type="password" name="contrasenya" id="contrasenya" required alt="contrasenya"
                   placeholder="Contrasenya"> <br>
            <input type="submit" id="login" name="login" alt="Botó de registre" value="Iniciar sessió"> <br>
        </form>
        <?php if (!empty($error)) { ?>
            <p style="color: red;"> <?php echo $error; ?> </p>
        <?php } ?>
    </section>
</div>
