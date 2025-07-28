<section class="content-producte">
	<?php
    foreach($infoProducte as $info) {
    ?>
            <div class="conjunt_img prod">
                <img src="<?php echo htmlentities($info['imgGran'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" alt="<?php echo $info['name'] ?> gameplay" class="img-vertical" />
                <img src="<?php echo htmlentities($info['imgPetita'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>" alt="<?php echo $info['name'] ?> portada" class="img-costat"/>
            </div>
            <div class="info-producte">
                <table>
                    <tr>
                        <td class="descripcio">
                            <h2 class="nom-producte"> <?php echo htmlentities($info['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?> </h2>
                            <h1 class="preu-producte"> <?php echo htmlentities($info['preu'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?>€ </h1>
                            <p> <?php echo htmlentities($info['descripcio'], ENT_QUOTES | ENT_HTML5, 'UTF-8')?> </p>
                         </td> 
                         <td>
                             <div class="comprar-producte">
                                 <div class="container-afegir-producte"> 
                                    <form action="" method="post"> 
                                        <div class="container-quantitat">
                                            <input type="number" name ="quantitat" placeholder="1" value="1" min="1" class="input-quantitat" />
                                        </div> 
                                        <div class="afegir">
                                            <button type="submit" class="afegir-producte" name="afegirCistell" value="<?php echo $info['id'] ?>">Afegir al cistell</button>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
	<?php
	    }   
	?>
</section> 