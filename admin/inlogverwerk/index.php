<?php

// Lees de config.
require_once ('../config/config.php');

// Lees alle formulieren.
$Gebruikersnaam = $_POST['Gebruikersnaam'];
$Wachtwoord = $_POST['Wachtwoord'];

// Zijn alle benodigde velden ingevuld?
if (strlen($Gebruikersnaam) > 0 && strlen($Wachtwoord) > 0)
{
	$Wachtwoord = md5($Wachtwoord);
	// Maak een query controle.
	$query = "SELECT * FROM EX_Admin WHERE Gebruikersnaam = '$Gebruikersnaam' AND Wachtwoord = '$Wachtwoord'";
	
	// Voer de query uit
	$resultaat = mysqli_query($conn, $query);
	
	// Inlog controle
	
	if (mysqli_num_rows($resultaat) == 1)
	{
		// Login is correct, start de sessie.
		session_start();
		// Sla de gebruikersnaam op in de sessie.
		$_SESSION['Gebruikersnaam'] = $Gebruikersnaam;
		// Stuur de admin terug naar de overzichtspagina
		header("Location:../index.php");
	}
	
	else
	{
		// De login is incorrect, stuur de gebruiker terug naar de inlog pagina van de Admins
		header("Location:../inlog/");
		exit;
	}
}
else
{
	echo "Voer alle velden in!";
	exit;
}
?>