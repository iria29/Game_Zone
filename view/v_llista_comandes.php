<div class="productes">
    <?php if(!empty($comandes)) { ?>
        <section class="container carrito">
            <h1> LES TEVES COMANDES: </h1>
            <div class="container-products">
            <?php foreach($comandes as $comanda) { ?>
                <div class="card-element">
                    <h3 id="data"> 
                        Comanda feta el <?php echo $comanda[0]['data_compra']?> a les <?php echo $comanda[0]['hora_compra']?>
                    </h3>
                    <?php foreach($comanda as $prod) { ?>
                        <div class="comanda"> 
                            <div class="container-img">
                                <img src="<?php echo $prod['img_prod'] ?>" alt="foto" />
                            </div>
                            <div class="content-name">
                                <div class="content-descripcio">
                                    <h3> 
                                        <?php echo $prod['nom']?> 
                                    </h3>
                                    <p>Quantitat: <?php echo $prod['quantitat']?></p>
                                    <p> <?php echo $prod['preu'] ?> € </p>
                                </div>
                            </div>  
                        </div>
                        <hr>
                    <?php } 
                    ?>
                    <p id="total"> Total: <?php echo $prod['total']?> €</p>  
                </div> 
                <?php }?>
        </div> 
    </section>
        <?php }
        else { ?>
            <section class="container missatge">
                <div class="card-resum">
                    <h2> 
                        ENCARA NO HAS FET CAP COMPRA :&#40; 
                    </h2>
                </div>
            </section>
    <?php } ?>
</div>