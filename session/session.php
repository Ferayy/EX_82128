<?php

// Start de sessie.
session_start();

// Controleer of er een gebruikersnaam is opgeslagen.
if (!isset($_SESSION['Gebruikersnaam']) || strlen($_SESSION['Gebruikersnaam']) == 0) {
	// Er is geen geldige inlog, stuur de gebruiker terug naar het inlog formulier.
	header("Location:../inlog/");
	exit;
}

?>