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
			<a href="../index.php" style="color:white;"><div id=bloc_menu><h3 style="margin-top:25px;">ACCUEIL</h3></div></a>
			<a href="boutique.php" style="color:white;"><div id=bloc_menu><h3 style="margin-top:25px;">BOUTIQUE</h3></div></a>

			<?PHP include 'menu.php';?>
			<div id="content">
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
				echo "Quantite = " . $value . "</br>";
				$quantite = $value;
				$result = mysqli_query($db, "SELECT * FROM item WHERE id = $key");
				mysqli_fetch_all($result, MYSQLI_ASSOC);
				foreach ($result as $key => $value) 
				{
				echo "Article: " . $value['name'] . "<br />" . " Prix: " . $value['prix'] . " euros<br />";
				echo "<img src=" . '../' . $value['image'] . " /><br /><br />";
				}
				$total = $total + ($quantite * $value['prix']);
			}

			}
			echo "<br />Total du prix des articles : " . $total . "euros ";

			if ($_SESSION['logged_as'])
			{
				?>
				<input type="submit" name="ACHETEZ" value="ACHETEZ">
				<?php
			}
			else
				echo " Connecter vous pour pouvoir passez commande";
			?>
	</div>
	<?PHP include '../footer.php';?>