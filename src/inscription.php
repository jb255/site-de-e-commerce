<?php
	include "../private/config.php";
	session_start();
	$db = sql_connect();

	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['register_submit'] == "Valider") {
		$is_email = 0;
		$is_pass = 0;
		if (!empty($_POST['register_email']))
			$is_email = 1;
		if (!empty($_POST['register_password']) && !empty($_POST['register_password2']) && $_POST['register_password'] == $_POST['register_password2'])
			$is_pass = 1;
		if ($is_pass && $is_email)
		{
			$email_reg = mysqli_real_escape_string($db, $_POST['register_email']);
			$pass_reg = mysqli_real_escape_string($db, $_POST['register_password']);

			if ($result = mysqli_query($db, "SELECT * FROM users"))
			{
				// $result = $result->fetch_all(MYSQLI_ASSOC);
				mysqli_fetch_all($result, MYSQLI_ASSOC);
				foreach ($result as $key => $value)
				{
					echo $value['e_mail'] . "<br />";
					echo $value['pass'] . "<br />";
					if ($value['e_mail'] === $_POST['register_email'])
					{
						$_SESSION['ins_error'] = "e_mail déjà utilisé";
					}
				}
			}
			if ($_SESSION['ins_error'] === '')
			{
				$pass_hash = hash("whirlpool", $pass_reg);
				if (mysqli_query($db, "INSERT INTO users (id, e_mail, pass, date_de_creation) VALUES (null, '$email_reg', '$pass_hash', NOW())") === TRUE)
				{
					$_SESSION['ins_error'] = "compte créée avec succès.";
				}
				else 
				{
					$_SESSION['ins_error'] = "mysqli error";
				}
			}
		}
		else
		{
			$_SESSION['ins_error'] = "Not correct";
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
			<?php include 'menu.php'; ?>
		</div>
		<div id="content">
			<center><h2>Inscription</h2>
			<form method="post" action="#">
				<p>Email :<br /><input type="email" name="register_email"></p>
				<p>Mot de passe :<br /><input type="password" name="register_password"></p>
				<p>Confirmation<br />du mot de passe :<br /><input type="password" name="register_password2"></p>
				<input type="submit" name="register_submit" value="Valider">
			</form>
		<?php 
		if ($_SESSION['ins_error'] !== "")
			echo $_SESSION['ins_error'];
		$_SESSION['ins_error'] = "";
		?>
			</center>
		</div>
	<?php include '../footer.php'; ?>
