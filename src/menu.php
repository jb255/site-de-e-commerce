
<?php
if ($_SESSION['panier']) {
	foreach ($_SESSION['panier'] as $key => $value)
		$nb_items++;
	}

// echo "affichage du " . $_SESSION['logged_as'];
	if (empty($_SESSION['logged_as'])) {
	echo "
		<a href=\"http://localhost:8080/Rush00/src/panier.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">MON PANIER";
	if ($nb_items)
		echo "<span class='panier_items'> ($nb_items)</span>";	
	echo "</h3></div></a>
		<a href=\"http://localhost:8080/Rush00/src/inscription.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">INSCRIPTION</h3></div></a>
		<a href=\"http://localhost:8080/Rush00/src/connexion.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">CONNEXION</h3></div></a>";
	}
	else {
		echo "<a href=\"http://localhost:8080/Rush00/src/panier.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">MON PANIER";
	if ($nb_items)
		echo "<span class='panier_items'> ($nb_items)</span>";	
	echo "</h3><span class='panier_items'>($nb_items)</span></div></a>
		<a href=\"http://localhost:8080/Rush00/src/account.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">MON COMPTE</h3></div></a>
		<a href=\"http://localhost:8080/Rush00/src/logout.php\" style=\"color:white;\"><div id=bloc_menu><h3 style=\"margin-top:25px;\">DECONNEXION</h3></div></a>";
	}
?>