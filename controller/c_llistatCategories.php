<?php
session_start();
require_once __DIR__.'/../model/connectaDb.php';

require_once __DIR__.'/../model/categories.php';

// Fem una consulta per obtenir totes les categories de la base de dades
$categories = getCategories();

require_once __DIR__.'/../view/v_llistatCategories.php';


?>