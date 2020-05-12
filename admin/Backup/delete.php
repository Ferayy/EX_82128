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
$result = mysqli_query($conn, "SELECT * FROM `E-Auction_Producten` WHERE Product_Nummer = $Product_Nummer");

	//is er een lid gevonden met dit ID?
	if (mysqli_num_rows($result) == 1) {
		//ja, lees het lid uit de dataset
		$row = mysqli_fetch_array($result);
	} else {
		echo "Geen product gevonden.";
		exit;
	}
} else {
// het ID was geen nummer
	echo "Onjuist ID.";
	exit;
}

?>


<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Verwijderen</title>
	</head>

<body>
	
	<h1>Product verwijderen</h1>
	
		<p>
			Weet je zeker dat je het product
			<strong><?php echo $row['Product_Image'] . " " . $row['Product_Naam']; ?></strong>
			wilt verwijderen?
		</p>
	
		<p>
			<a href="delete_verwerk.php?Product_Nummer=<?php echo $Product_Nummer; ?>">Ja, verwijderen</a>
			/
			<a href="admindetail.php">Nee, terug</a>
		</p>
	
</body>
	
</html>