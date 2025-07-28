<?php

function getConn()
{
    $servidor = "localhost";
	$port = "5432";
	$dbname = "postgres";	
	$user = "postgres";
	$key = "447422";
	return pg_connect("host=$servidor port=$port dbname=$dbname user=$user password=$key");
}

?>