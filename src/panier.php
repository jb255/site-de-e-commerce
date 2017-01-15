<?php
	session_start();
	include "../private/config.php";

?>
<html>
	<head>
		<title>Rush00</title>
		<link rel="stylesheet" href="../css/style.css" />
	</head>
	<body>
		<div id="menu">
			<a href="../index.php" style="color:white;"><div id="bloc_menu"><h3 style="margin-top:25px;">ACCUEIL</h3></div></a>
			<a href="boutique.php" style="color:white;"><div id="bloc_menu"><h3 style="margin-top:25px;">BOUTIQUE</h3></div></a>

			<?php include 'menu.php';?>
		</div>
		<div id="content" style="padding-left: 2em;">
			<center><h2>Mon panier</h2></center>
			<?php 
			// print_r($_SESSION);
			$db = sql_connect();
			$total = 0;
			// $result = mysqli_query($db, "SELECT * FROM item");
			// mysqli_fetch_all($result, MYSQLI_ASSOC);
			if ($_SESSION['panier'])
			{
				foreach ($_SESSION['panier'] as $key => $value)
				{
					echo "Quantite = " . $value . "<br />";
					$quantite = $value;
					$result = mysqli_query($db, "SELECT * FROM item WHERE id = $key");
					mysqli_fetch_all($result, MYSQLI_ASSOC);
					foreach ($result as $key => $value) 
					{
						echo "Article : " . $value['name'] . "<br />" . " Prix : " . $value['prix'] . " euros<br />";
						echo "<img src=" . '../' . $value['image'] . " /><br /><br />";
					}
					$total = $total + ($quantite * $value['prix']);
				}
			}
			if ($total == 0)
				echo "<br /><h3>Votre panier est vide</h3>";
			else
				echo "<br />Total du prix des articles : " . $total . " euros";

			if ($_SESSION['logged_as'])
			{
				if ($total !== 0)
				{
					?>
					<input type="submit" name="ACHETER" value="ACHETER">
					<?php
				}
				else 
					echo "<h3>Veuillez remplir votre panier.</h3>";
			}
			else
				echo "<h3>Connectez-vous pour pouvoir passer commande</h3>";
			?>
	</div>
	<?php include '../footer.php'; ?>