<?php
	session_start();
	include "private/config.php";
	$db = sql_connect();
?>
<html>
	<head>
		<title>Rush00</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="menu">
			<a href="index.php" style="color:white;"><div id=bloc_menu><h3 style="margin-top:25px;">ACCUEIL</h3></div></a>
			<a href="#" style="color:white;"><div id=bloc_menu><h3 style="margin-top:25px;">BOUTIQUE</h3></div></a>
			<?php include 'src/menu.php'; ?>
		</div>
		<div id="content" style="padding-left: 2em; width:98%;height:780px;overflow-y: scroll;float:center;display: inline-block;">
			<center><h2>Boutique</h2></center>
<?php
			$result = mysqli_query($db, "SELECT * FROM item WHERE fruit = 1");
			mysqli_fetch_all($result, MYSQLI_ASSOC);
			if ($result) {
				echo "<span class='items_list'><h3>FRUITS</h3>";
				foreach ($result as $key => $value) {
					echo $value['name'] . " - <span class='prix'>Prix : " . $value['prix'] . " &euro;</span><br />";
					echo "<img src='". $value['image'] ."' height='150' title='" . $value['description'] . "' alt='" . $value['description'] . "' /><br />";
					echo "Ajouter au panier : <a href='achat.php?id=" . $value['id'] . "'>Ajouter</a>" . "<br /><br />";
				}
				echo "</span>";
			}

			$result = mysqli_query($db, "SELECT * FROM item WHERE jaune = 1");
			mysqli_fetch_all($result, MYSQLI_ASSOC);
			if ($result) {
				echo "<span class='items_list'><h3>TRUCS JAUNES</h3>";
				foreach ($result as $key => $value) {
					echo $value['name'] . " - Prix : " . $value['prix'] . " &euro;<br />";
					echo "<img src='". $value['image'] ."' height='150' title='" . $value['description'] . "' alt='" . $value['description'] . "' /><br />";
					echo "Ajouter au panier : <a href='achat.php?id=" . $value['id'] . "'>Ajouter</a>" . "<br /><br />";
				}
				echo "</span>";
			}

			$result = mysqli_query($db, "SELECT * FROM item WHERE rouge = 1");
			mysqli_fetch_all($result, MYSQLI_ASSOC);
			if ($result) {
				echo "<span class='items_list'><h3>TRUCS ROUGES</h3>";
				foreach ($result as $key => $value) {
					echo $value['name'] . " - Prix : " . $value['prix'] . " &euro;<br />";
					echo "<img src='". $value['image'] ."' height='150' title='" . $value['description'] . "' alt='" . $value['description'] . "' /><br />";
					echo "Ajouter au panier : <a href='achat.php?id=" . $value['id'] . "'>Ajouter</a>" . "<br /><br />";
				}
				echo "</span>";
			}
?>
		</div>
	<?php include 'footer.php'; ?>