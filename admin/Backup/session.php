<?php
// start de sessie
session_start();

// controleer of er een username is opgeslagen
if (!isset($_SESSION['Naam']) || strlen($_SESSION['Naam']) == 0) {
	// geen geldige login, stuur naar het inlogformulier
	header("Location:adminlog.php");
	exit;
}

?>