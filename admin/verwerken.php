<?php

// Start de sessie.
session_start();

// Lees het config bestand.
require_once("../config/config.php");

// Initialiseer alle variabelen.

$Land_ID = 0;
$update = false;
$Land = '';
$WG = '';
$W = '';
$G = ''; 
$V = '';
$DV = '';
$DT = '';
$Punten = '';

// Als het formulier is ingevuld.
if(isset($_POST['submit'])){
	
	// Alle variabelen met de POST vanuit de database.
	$Land = $_POST['Land'];
	$WG = $_POST['WG'];
	$W = $_POST['W'];
	$G = $_POST['G'];
	$V = $_POST['V'];
	$DV = $_POST['DV'];
	$DT = $_POST['DT'];
	$Punten = $_POST['Punten'];
	
	$conn->query("INSERT INTO EX_Landen (Land, WG, W, G, V, DV, DT, Punten) VALUES('$Land', '$WG', '$W', '$G', '$V', '$DV', '$DT', '$Punten')") or die($conn->error);
	
	$_SESSION['message'] = "Uw aanpassing is opgeslagen!";
	$_SESSION['msg_type'] = "success";
	
	header("location: index.php");
	
}

// Als er op de verwijder knop is gedrukt
	if(isset($_GET['delete'])){
		$Land_ID = $_GET['delete'];
		$conn->query("DELETE FROM EX_Landen WHERE LAND_ID = $Land_ID") or die ($conn->error());
		
		$_SESSION['message'] = "Uw gekozen record is verwijderd";
		$_SESSION['msg_type'] = "danger";

		header("location: index.php");
	}

// Als er op de edit button geklikt wordt.

if(isset($_GET['edit'])){
	
	$Land_ID = $_GET['edit'];
	$update = true;
	$resultaat = $conn->query("SELECT * FROM EX_Landen WHERE LAND_ID=$Land_ID") or die($conn->error);
	if($resultaat->num_rows){
		$rij = $resultaat->fetch_array();
		$Land = $rij['Land'];
		$WG = $rij['WG'];
		$W = $rij['W'];
		$G = $rij['G'];
		$V = $rij['V'];
		$DV = $rij['DV'];
		$DT = $rij['DT'];
		$Punten = $rij['Punten'];
	}
}

// Als er op de update button geklikt wordt.

if(isset($_POST['update'])){
	
	$Land_ID = isset($_GET['LAND_ID']) ? $_GET['LAND_ID'] : '';
	$Land = $_POST['Land'];
	$WG = $_POST['WG'];
	$W = $_POST['W'];
	$G = $_POST['G'];
	$V = $_POST['V'];
	$DV = $_POST['DV'];
	$DT = $_POST['DT'];
	$Punten = $_POST['Punten'];
	
	$conn->query("UPDATE EX_Landen SET Land='$Land', WG='$WG', W='$W', G='$G', V='$V', DV='$DV', DT='$DT', Punten='$Punten' WHERE LAND_ID = $Land_ID") or die($conn->error);
	
	$_SESSION['message'] = "Uw gekozen record is aangepast!";
	$_SESSION['msg_type'] = "warning";
	
	header('location: ../index.php');
	
}

?>