<?php
include "private/config.php";
sql_connect();
if (isset($_POST['submit'])) {
	$sql = file_get_contents("boutique.sql");
	$sql_array = explode(";", $sql);
	foreach ($sql_array as $val) {
		mysqli_query($db, $val);
	}
}
?>

<html>
<head>
	<title>Installation de la boutique</title>
</head>
<body>
<form action="install.php" method="post" id="install">
	<input type="submit" name="submit" value="Installer la boutique" />
</form>
</body>
</html>