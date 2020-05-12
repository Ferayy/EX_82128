<?php
// controleer of je bent ingelogt
require_once 'session.php';

// lees het config-bestand
require_once 'config.php';

// Lees de zoekterm uit de URL
$Product_Nummer = $_GET['Product_Nummer'];

// is het ID een nummer?
if (is_numeric($Product_Nummer)) {	
	
/// Zoek in de database
$result = mysqli_query($conn,  "DELETE FROM `E-Auction_Producten` WHERE Product_Nummer = $Product_Nummer");
	
	//controleer het resultaat
	if ($result) {
		// alles OK, stuur naar de homepage
		header("Location:admindetail.php");
	exit;
	} else {
		echo 'Er ging wat mis met het verwijderen!';
	}
} else {
// het ID was geen nummer
	echo "Onjuist ID.";
	exit;
}

?>