
<?PHP
// echo "affichage du " . $_SESSION['logged_as'];
	if (empty($_SESSION['logged_as'])) {
	echo "
		<a href=\"http://localhost:8080/Rush00/src/\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">MON PANIER</h3></div></a>
		<a href=\"http://localhost:8080/Rush00/src/inscription.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">INSCRIPTION</h3></div></a>
		<a href=\"http://localhost:8080/Rush00/src/connexion.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">CONNEXION</h3></div></a>";
	}
	else {
		echo "<a href=\"http://localhost:8080/Rush00/src/\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">MON PANIER</h3></div></a>
		<a href=\"http://localhost:8080/Rush00/src/account.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">MON COMPTE</h3></div></a>
		<a href=\"http://localhost:8080/Rush00/src/logout.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">DECONNECTION</h3></div></a>";
	}
	?>
</div>
