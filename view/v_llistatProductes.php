<div class="productes detalls">
    <section class="banner">
        <?php foreach($categoryInfo as $fila) {  ?>
        <img src="<?php echo htmlentities($fila['img'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" alt="Jocs de <?php echo htmlentities($fila['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>">
        <div class="content-banner">
            <h2>
                <?php echo htmlentities($fila['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
            </h2>
        </div>
        <?php
                }   
            ?> 
    </section> 

    <section class="specials">
        <h1>Productes</h1>
        <div class="container-products">
            <?php foreach($productes as $producte) {  ?>
            <div class="card-product">
                <div class="container-img">
                    <img src="<?php echo htmlentities($producte['imgPetita'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" alt="<?php echo htmlentities($producte['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> portada" />
                </div>
                <div class="content-card-product">
                    <h3>
                        <a href="#" class="button-producte"> 
                            <p class="name" id="<?php echo htmlentities($producte['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>">
                                <?php echo htmlentities($producte['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>
                            </p>
                        </a>
                    </h3>
                </div>
                <p class="price">
                    <?php echo htmlentities($producte['preu'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>€ 
                </p>
            </div> 
            
            <?php
                }   
            ?>
        </div> 
    </section>
</div>