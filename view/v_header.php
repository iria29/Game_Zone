<header>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="view/jQueryMenuDespegable.js"></script>
    <script src="view/jQueryProvaDetallProducte.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/css/headerAndFooter.css" />
       
    <div class="container-navbar container-header">
        <nav class="navbar-container">	
            <ul class="menu">
                <li id="logo"><img src="resources/img/headerAndFooter/logo.png" alt="Logo" width="80px"></li>
                <li id="inicio"><a href="/web/index.php?action=inici"> Inici</a></li>
                <li id="tipos"><a href="/web/index.php?action=categories"> Categories</a></li>
                <li id="buscar">
                    <form action="" class="search-form" method="post">
                        <input type="search" placeholder="Buscar.." name="text-search" />
                        <button name="search-button" class="boton-search"> </button>
                    </form>
                </li>
                <li id="cesta">
                    <div class="container-icon">
                        <a href="/web/index.php?action=<?php if($_SESSION["login"] == true) { echo 'carret'; } else { echo 'login'; } ?>"><img class="imgNavBar cesta" src="resources/img/headerAndFooter/cesta.png" alt="imatge cesta"></a>
                            <?php if($_SESSION["login"] == true) {?>
                                <div class="count-products">
                                    <?php 
                                    $total = 0;
                                    if(!empty($_SESSION["producte"])) {
                                        foreach($_SESSION["producte"] as $producte) {
                                            $total = $total + intval($producte[1]);
                                        }
                                    }
                                    echo $total; ?>
                                </div>
                                <?php } ?>
                    </div>
                </li>
				<li id="perfil">
					<img class="imgNavBar imgPerfil" src="resources/img/headerAndFooter/perfil.png" alt="imatge perfil">
					<ul class="menu_desplegable"></ul>
				</li>
            </ul>
        </nav>
    </div>  
</header>
<div class="body">