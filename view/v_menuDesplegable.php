<?php 

if($logejat == false) { ?>
    <li>
        <a href="/GameZone/index.php?action=registre">Registre</a>
    </li>
    <li>
        <a href="/GameZone/index.php?action=login">Login</a>
    </li>
<?php } else { ?>
    <li>
        <a href="/GameZone/index.php?action=perfil">El meu compte</a>
    </li>
    <li>
        <a href="/GameZone/index.php?action=carret">Carret</a>
    </li>
    <li>
        <a href="/GameZone/index.php?action=llistat">Llistat de comandes</a>
    </li>
    <li>
        <a href="/GameZone/index.php?action=logout">Tancar sessió</a>
    </li>
<?php } ?>