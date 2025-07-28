<div class="productes">
    <section class="carrito">
        <div class="container-products">
            <?php $total = 0.00;
            foreach($productes as $producte) {  
                $total = $total + ($producte[0]["preu"] * $producte[1]);
                ?>
                <div class="card-element">
                    <div class="container-img">
                        <img src="<?php echo htmlentities($producte[0]['imgGran'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" alt="<?php echo htmlentities($producte[0]['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> portada" />
                    </div>
                    <div class="content-card-element">
                        <div class="content-descripcio">
                            <h3><a href="#" class="button-producte"> <p class="name" id="<?php echo htmlentities($producte[0]['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>"><?php echo htmlentities($producte[0]['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?></p></a></h3>
                        </div>
                    </div>
                    <div class="eliminarProd">
                        <div class="info">
                            <p><?php echo htmlentities($producte[0]['preu'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>€</p>
                        </div>
                        <form action="" method="post">
                            <div class="quantity-control">
                                <button class="boto-quantitat quantity-btn decrease" name="decrementarProd" value="<?php echo $producte[0]["id"]; ?>">-</button>
                                <input type="text" class="quantitat" value="<?php echo $producte[1] ?>" readonly>
                                <button class="boto-quantitat quantity-btn increase" name="incrementarProd" value="<?php echo $producte[0]["id"]; ?>" >+</button>
                            </div>
                            <button type="submit" class="button" id="eliminar-producte" name="eliminarCistell" value="<?php echo $producte[0]["id"]; ?>">Eliminar</button>
                        </form>
                    </div>
                </div> 
            <?php } ?>
        </div> 
        <div class="button-buidar">
            <form action="" method="post">
                <button type="submit" class="button" id="buidar-producte" name="buidarCistell" value="1">Buidar el cistell</button>
            </form>
        </div>
    </section>
    <section class="resum">
        <div class="card-resum">
            <h2> RESUM DE LA TEVA COMPRA: </h2>
            <?php  $_SESSION["total"] = $total;
            foreach($productes as $producte) {  ?>
                <p> <?php echo $producte[0]['name'] ?> - <?php echo $producte[1] ?> </p>
            <?php } ?>
            <h3> Total: <?php echo $total ?>€ </h1>
            <form action="" method="post">
                <button type="submit" class="button" id="comprar-producte" name="comprarProd" value="1">Comprar cistell</button>
            </form>
        </div>
    </section>
</div>