<section class="categories">
    <h1> Categories</h1>
    <div class="container-categories">
        <?php
        foreach($categories as $fila) {
            ?>

            <div class="card-categoria">
                <img src="<?php echo htmlentities($fila['img'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" alt="Jocs de <?php echo htmlentities($fila['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>">
                <div class="contingut-categoria">
                    <p class="title"> <?php echo htmlentities($fila['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?> </p>
                        <a href="#" class="button-productes"><p id="<?php echo htmlentities($fila['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>">Productes</p></a>
                </div> 
            </div> 

            <?php
        }   
            ?>
    </div>
</section>