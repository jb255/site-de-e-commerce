<?PHP
	session_start();
	include "private/config.php";

?>
<html>
	<head>
		<title>Rush00</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="menu">
			<a href="index.php" style="color:white;"><div id=bloc_menu><h3 style="margin-top:25px;">ACCUEIL</h3></div></a>
			<a href="http://localhost:8080/Rush00/src/boutique.php" style="color:white;"><div id=bloc_menu><h3 style="margin-top:25px;">BOUTIQUE</h3></div></a>
		<?PHP
			include 'src/menu.php';
		?>
		<div id="content">
			<?PHP
			$db = sql_connect();

			// $result = $db->query("SELECT * FROM item");
			$result = mysqli_query($db, "SELECT * FROM item");
			mysqli_fetch_all($result, MYSQLI_ASSOC);

			foreach ($result as $key => $value) {
				echo "$key --" .  $value['name'] . " Prix:" . $value['prix'] . " euros<br />";
				echo "<img src=". $value['image'] . " /><br />";
				echo "Ajouter au panier : <a href=achat.php?id=" . $value['id'] . ">Ajouter </a>" . "<br /><br />";
			}
			?>
		</div>
		<?PHP
			include 'footer.php';
		?>
