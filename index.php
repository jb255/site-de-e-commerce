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
			$result = $result->fetch_all(MYSQLI_ASSOC);

			foreach ($result as $key => $value) {
				echo "$key --" .  $value['name'] . " Prix:" . $value['prix'] . " euros<br/>";
				echo "<img src=". $value['image'] . " /><br/>";
				echo "Achat: <a href=achat.php?" . $value['id'] . " >ici</a>";
			}
			?>
		</div>
		<?PHP
			include 'footer.php';
		?>
