<?PHP
include "private/config.php";

$db = sql_connect();
if (mysql_query($db, "CREATE DATABASE boutique") === TRUE)
{
	//executer fichier .sql
	mysql_select_db("boutique", $db);
    printf("Database créée avec succès.<br/>");
}
else
{
	echo "Database deja existante!<br/>";
}

?>
