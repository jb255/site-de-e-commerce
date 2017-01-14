<?php

$db_url = "localhost:8080";
$db_user = "root";
$db_pass = "root";
$db_base = "boutique";

function sql_connect()
{
	$db = mysqli_connect($db_url, $db_user, $db_pass, $db_base);
	if (!isset($db))
	{
		print("Error connecting to database\n");
		return (FALSE);
	}
	return ($db);
}
?>
