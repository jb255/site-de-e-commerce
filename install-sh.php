#!/usr/bin/php
<?php
include "private/config.php";

function sql_connect1()
{
	$db = mysqli_connect($db_url, $db_user, $db_pass);
	if (!isset($db))
	{
		echo "Erreur de connexion à la base de données\n";
		return (FALSE);
	}
	return ($db);
}

$db = sql_connect1();
if (mysqli_query($db, "CREATE DATABASE boutique") === TRUE)
{
	//executer fichier .sql
		mysqli_select_db($db, "boutique");
    echo "Boutique créée avec succès !";
}
else
{
	echo "Boutique déjà créée !";
}

?>
