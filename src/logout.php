<?php

session_start();
$_SESSION['logged_as'] = '';
header ('Location: ../index.php');

?>