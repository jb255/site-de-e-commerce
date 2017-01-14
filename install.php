<?PHP
include "private/config.php";

function sql_connect1()
{
	$db = mysqli_connect($db_url, $db_user, $db_pass);
	if (!isset($db))
	{
		print("Error connecting to database\n");
		return (FALSE);
	}
	return ($db);
}

$db = sql_connect1();
if (mysqli_query($db, "CREATE DATABASE boutique") === TRUE)
{
	//executer fichier .sql
		mysqli_select_db($db, "boutique");
    printf("Database créée avec succès.<br/>");
}
else
{
	echo "Database deja existante!<br/>";
}

?>
