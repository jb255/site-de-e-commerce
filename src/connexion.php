<?php
	include "../private/config.php";
	session_start();
	$db = sql_connect();

	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['connect_submit'] == "Valider") {
		$is_email = 0;
		$is_pass = 0;
		if (!empty($_POST['connect_email']))
			$is_email = 1;
		if (!empty($_POST['connect_password']))
			$is_pass = 1;
		if ($is_pass && $is_email)
		{
			$email_reg = mysqli_real_escape_string($db, $_POST['connect_email']);
			$pass_reg = mysqli_real_escape_string($db, $_POST['connect_password']);

			if ($result = mysqli_query($db, "SELECT * FROM users"))
			{
				// $result = $result->fetch_all(MYSQLI_ASSOC);
				mysqli_fetch_all($result, MYSQLI_ASSOC);
				foreach ($result as $key => $value)
				{
					echo $value['e_mail'] . "<br />";
					echo $value['pass'] . "<br />";
					if ($value['e_mail'] === $email_reg)
					{
						$is_email = 2;
						$pass_hash = hash("whirlpool", $pass_reg);
						if ($value['pass'] === $pass_hash)
						{
							$is_pass = 2;
							$_SESSION['logged_as'] = $email_reg;
							$_SESSION['mess_error'] = "Connexion Réussie";
						}
						else
							$_SESSION['mess_error'] = "Mauvais mot de passe";
					}
				}
			}
			else {
				$_SESSION['mess_error'] =  "mysqli error";
			}
		}
		else
		{
			$_SESSION['mess_error'] =  "Not correct";
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
			<a href="../index.php" style="color:white;"><div id="bloc_menu"><h3 style="margin-top:25px;">ACCUEIL</h3></div></a>
			<a href="boutique.php" style="color:white;"><div id="bloc_menu"><h3 style="margin-top:25px;">BOUTIQUE</h3></div></a>
			<?PHP include 'menu.php'; ?>
	<div id="content">
		<center><h2>Connexion</h2>
		<form method="post" action="#">
			Email :<br /><input type="email" name="connect_email"><p>
			Mot de passe :<br /><input type="password" name="connect_password"><p>
			<input type="submit" name="connect_submit" value="Valider">
		</form>
		<?php 
		if ($_SESSION['mess_error'] !== "")
			echo $_SESSION['mess_error'];
		$_SESSION['mess_error'] = "";
		?>
		</center>
	</div>
	<?php include '../footer.php'; ?>
