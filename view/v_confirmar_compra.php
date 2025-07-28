<div class="productes">
    <section class="container missatge">
        <div class="card-resum">
    <?php
    if($_GET["possible"] == 1) { ?>
            <h2> GRÀCIES PER LA TEVA COMPRA :&#41;</h2>
            <form action="" method="post">
                <button type="submit" class="button" id="tornar" name="llistatComandes" value="1"> Llistat de comandes </button>
            </form>
    <?php }
    else { ?>
            <h2> HI HA HAGUT ALGUN PROBLEMA AMB LA TEVA COMPRA :&#40; </h2>
            <form action="" method="post">
                <button type="submit" class="button" id="tornar" name="tornarCarret" value="1"> Tornar al carret </button>
            </form>
    <?php } ?>
        </div>
    </section>
</div>