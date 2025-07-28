<?php
session_start();

$action = $_GET['action'] ?? null;

switch($action)
{
    case 'inici':
        require_once __DIR__.'/resources/resource_inici.php';
        break;
    case 'registre':
        require_once __DIR__.'/resources/resource_registre.php';
        break;
    case 'categories':
        require_once __DIR__.'/resources/resource_category_list.php';
        break;
    case 'productes':
        require_once __DIR__.'/resources/resource_product_list.php';
        break;
    case 'detallsProducte':
        require_once __DIR__.'/resources/resource_product.php';
        break;
    case 'login':
        require_once __DIR__.'/resources/resource_login.php';
        break;
    case 'carret':
        require_once __DIR__.'/resources/resource_carret.php';
        break;
    case 'logout':
        require_once __DIR__.'/controller/c_tancarSessio.php';
        break;
    case 'perfil':
        require_once __DIR__.'/resources/resource_perfil.php';
        break;
    case 'confirmar':
        require_once __DIR__.'/resources/resource_confirmarCompra.php';
        break;
    case 'llistat':
        require_once __DIR__.'/resources/resource_llista_comandes.php';
        break;    
    default:
        require_once __DIR__.'/resources/resource_inici.php';
        break;
}
?>
