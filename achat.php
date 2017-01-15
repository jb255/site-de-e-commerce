<?php
	session_start();
	if ($_GET['id'] !== '')
		$_SESSION['panier'][$_GET['id']] += 1;
	// print_r($_SESSION);
	header ('Location: boutique.php');
?>
