<link rel="stylesheet" type="text/css" href="/resources/css/producte.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/llistatProductes.css" />

<div class="productes">
    <section class="container specials">
        <?php if(!empty($productes))  { ?>
            <h1>Resultats</h1>
            <div class="container-products">
            <?php foreach($productes as $producte) {  ?>
            <div class="card-product">
                <div class="container-img">
                    <img src="<?php echo htmlentities($producte['imgPetita'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" alt="<?php echo htmlentities($producte['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> portada" />
                </div>
                <div class="content-card-product">
                    <h3><a href="#" class="button-producte"> <p class="name" id="<?php echo htmlentities($producte['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>"><?php echo htmlentities($producte['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?></p></a></h3>
                </div>
                <p class="price"><?php echo htmlentities($producte['preu'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>€ </p>
            </div> 
            
            <?php
                }   
            ?>
            </div> 
        <?php } else { ?>
            <h1>No hi han resultats :&#40;</h1>
        <?php } ?>
    </section>
</div>