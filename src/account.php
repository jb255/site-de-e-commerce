<?php
	include "../private/config.php";
	session_start();
	$db = sql_connect();

	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['connect_submit'] === "Attention cette action est irreversible")
	{
		$is_pass = 0;
		if (!empty($_POST['delete_password']))
			$is_pass = 1;
		if ($is_pass)
		{
			$pass_reg = mysqli_real_escape_string($db, $_POST['delete_password']);
			if ($result = mysqli_query($db, "SELECT * FROM users"))
			{
				mysqli_fetch_all($result, MYSQLI_ASSOC);
				// echo $pass_reg;
				// echo $_SESSION['logged_as'];
				foreach ($result as $key => $value)
				{
					// echo $value['e_mail'] . "<br/>";
					// echo $value['pass'] . "<br/>";
					if ($value['e_mail'] === $_SESSION['logged_as'])
					{
						$is_email = 2;
						$pass_hash = hash("whirlpool", $pass_reg);
						$log = $_SESSION['logged_as'];
						if ($value['pass'] === $pass_hash)
						{
							$_SESSION['del_error'] = "Votre compte a bien été suprimé";
							mysqli_query($db, "DELETE FROM users WHERE e_mail = '$log'");
							session_unset($_SESSION);
							header ('Location: ../index.php');
						}
						else
							$_SESSION['del_error'] = "Mauvais mot de passe";
					}
				}
			}
			else {
				$_SESSION['del_error'] =  "mysqli error";
			}
		}
		else
		{
			$_SESSION['del_error'] =  "Not correct";
		}
	}
	$titi = $_SESSION['logged_as'];
	$toto = mysqli_query($db, "SELECT * FROM users WHERE e_mail = '$titi'");
	mysqli_fetch_all($toto, MYSQLI_ASSOC);
	foreach ($toto as $key => $value)
	{
		if ($value['admin'] === 1)
		{
			$_SESSION['admin'] = 1;
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
			<?php include 'menu.php'; ?>
		</div>
		<div id="content">
			<center><h2>Désinscription</h2>
			<form method="post" action="#">
				<p>Mot de passe :<br /><input type="password" name="delete_password"></p>
				<input type="submit" name="connect_submit" value="Attention cette action est irreversible">
			</form>
		<?php 
		if ($_SESSION['del_error'] !== "")
			echo $_SESSION['del_error'];
		$_SESSION['del_error'] = "";	
		?>
			</center>
		</div>
	<?php include '../footer.php'; ?>

