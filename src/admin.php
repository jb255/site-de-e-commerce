<?PHP
	include "../private/config.php";
	session_start();
	$db = sql_connect();


	$titi = $_SESSION['logged_as'];
	$toto = mysqli_query($db, "SELECT * FROM users WHERE e_mail = '$titi'");
	mysqli_fetch_all($toto, MYSQLI_ASSOC);

	foreach ($toto as $key => $value)
	{
		echo $value['admin'];
	}
		if ($value['admin'] !== 1)
		{
			header ('Location: ../index.php');
			echo "tamere la pute";
		}
	if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id_delete'] && $value['admin'] === 1))
	{
		$id_to_delete = $_GET['id_delete'];
		mysqli_query($db, "DELETE FROM item WHERE id LIKE '$id_to_delete'");
	}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name_item']) && !empty($_POST['prix_item']) && !empty($_POST['image_item']) && !empty($_POST['desc_item'] && $_POST['submit_item'] === 'Valider' && $value['admin'] === 1))
	{
		echo "AJOUT DE L'ITEM";
		$name_item = $_POST['name_item'];
		$image_item = $_POST['image_item'];
		$prix_item = $_POST['prix_item'];
		$desc_item = $_POST['desc_item'];
		$fruit_item = $_POST['fruit_item'];
		$jaune_item = $_POST['jaune_item'];
		$rouge_item = $_POST['rouge_item'];
		mysqli_query($db, "INSERT INTO item (id, name, description, fruit, image, prix, jaune, rouge) VALUES (null, '$name_item', '$desc_item', '$fruit_item', '$image_item', '$prix_item', '$jaune_item', '$rouge_item')");
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['delete_member'] && $_POST['delete'] === 'Suprimer membre' && $value['admin'] === 1))
	{	
			if ($result = mysqli_query($db, "SELECT * FROM users"))
			{
				mysqli_fetch_all($result, MYSQLI_ASSOC);
				foreach ($result as $key => $value)
				{
					if ($value['e_mail'] === $_POST['delete_member'])
					{
						$log = $_POST['delete_member'];
						$_SESSION['del_error'] = "Le compte a bien été suprimé";
						mysqli_query($db, "DELETE FROM users WHERE e_mail = '$log'");
					}
				}
			}
	}
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
			<?PHP include 'menu.php'; ?>

	<div id="content">
		<div id="all_products" style="margin:8px;width:98%;height:550px;border:solid;overflow-y: scroll;float:center;display: inline-block;">
			<?PHP
			$db = sql_connect();

			$result = mysqli_query($db, "SELECT * FROM item");
			mysqli_fetch_all($result, MYSQLI_ASSOC);

			foreach ($result as $key => $value) {
				echo $value['name'] . " Prix:" . $value['prix'] . " euros<br />";
				echo "<img src=../". $value['image'] . " /><br />";
				echo "Supprimer : <a href=admin.php?id_delete=" . $value['id'] . ">X </a>" . "<br /><br />";
			}
			?>
		</div>
		<div id="create_item" style="margin:8px;width:98%;height:200px;border:solid;overflow-y: scroll;">
			<form method="post" action=#>
				Nom de l'item <input type="text" name="name_item"><br/>
				Prix de l'item <input type="text" name="prix_item"><br/>
				Image de l'item <input type="text" name="image_item"><br/>
				Description de l'item <input type="text" name="desc_item"><br/>
				L'item est un fruit<input type="text" name="fruit_item"><br/>
				L'item est jaune<input type="text" name="jaune_item"><br/>
				L'item est rouge<input type="text" name="rouge_item"><br/>
				<input type=submit name="submit_item" value="Valider"><br /><br />
				Suprimer un membre <input type="text" name="delete_member"><br/>
				<input type=submit name="delete" value="Suprimer membre"><br />
			</form>
					<?php 
		if ($_SESSION['del_error'] !== "")
			echo $_SESSION['del_error'];
		$_SESSION['del_error'] = "";
		?>

		</div>
	</div>
	<?PHP include '../footer.php';?>