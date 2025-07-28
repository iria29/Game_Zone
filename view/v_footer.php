</div>
<footer>
    <div class="content-navbar container-footer">
        <?php if (isset($_SESSION["login"]) && $_SESSION["login"] == true) { ?>
            <?php
                if (!empty($_SESSION["producte"])) {
                    $totalProductes = 0;
                    $preuTotal = 0;
                    $ultimoProducto = null;

                    foreach($productes as $producte) {  
                        $preuTotal = $preuTotal + ($producte[0]["preu"] * $producte[1]);
                        $totalProductes = $totalProductes + $producte[1];
                        $ultimProducte = $producte[0]["name"];
                    }
            ?>
            <div class='terminos'> 
                <p>Total de productes: <?php echo $totalProductes; ?></p> 
            </div>
            <div class="contacto"> 
                <p>Preu total: <br> <?php echo number_format($preuTotal, 2, ',', '.'); ?> €</p>                
            </div>
            <div>
                <p class="redes">Últim producte afegit: <br> <?php echo htmlspecialchars($ultimProducte); ?></p>
            </div>
            <?php } else { ?>
                    <p>No tens cap producte al carret.</p>
                <?php } ?>
            <?php } else { ?>
            <div class="terminos">
                <p>Política de privadesa i protecció de dades</p>						
            </div>
            <div class="contacto">
                <ul>
                    <li>Entrega disponible a tota Catalunya</li>
                    <li>Direcció: Pg. Gràcia, 16, L'Eixample, 08008, Barcelona</li>
                    <li>Telèfon: 937 89 51 43</li>
                    <li>Província: Barcelona</li>
                </ul>
            </div>
            <div class="redes">
                <a href="https://www.instagram.com/" target="_blank">
                    <img src="resources/img/headerAndFooter/instagramLogo.png" id="instagramLogo">
                </a>
            </div>
        <?php } ?>
    </div>
</footer>
