<?php 

if($logejat == false) { ?>
    <li>
        <a href="index.php?action=registre">Registre</a>
    </li>
    <li>
        <a href="index.php?action=login">Login</a>
    </li>
<?php } else { ?>
    <li>
        <a href="index.php?action=perfil">El meu compte</a>
    </li>
    <li>
        <a href="index.php?action=carret">Carret</a>
    </li>
    <li>
        <a href="index.php?action=llistat">Llistat de comandes</a>
    </li>
    <li>
        <a href="index.php?action=logout">Tancar sessió</a>
    </li>
<?php } ?>