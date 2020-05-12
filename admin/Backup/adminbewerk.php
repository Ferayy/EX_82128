<?php
// Controleer of je bent ingelogd
require_once 'session.php';

// Lees het config-bestand
require_once 'config.php';

// Lees de zoekterm uit de URL
$Land_ID = $_GET['LAND_ID'];

// Is het ID een nummer?
if (is_numeric($Land_ID)) {	
	
/// Zoek in de database
$resultaat = mysqli_query($conn, "SELECT * FROM EX_Landen WHERE LAND_ID = $Land_ID");

//is er een land gevonden met dit ID?
if (mysqli_num_rows($resultaat) == 1) 
{
//ja, lees het lid uit de dataset
$rij = mysqli_fetch_array($resultaat);
} else {
		
	echo "Geen land gevonden.";
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
	<title> Admin Poule Beheer </title>
</head>

<body>
	
	<h1> Landen bewerken </h1>
	
	<form action="bewerk_verwerk.php" method="post">
	
		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<p>
			<label for="Land">Land</label>
			<input type="text" name="first_name" id="first_name" required="required"
			value="<?php echo $row['first_name']; ?>">
		</p>

		<p>
			<label for="WG">WG</label>
			<input type="text" name="last_name" id="last_name" required="required"
			value="<?php echo $row['last_name']; ?>">
		</p>

		<p>
			<input type="submit" name="submit" id="submit" value="Opslaan">
			<button onclick="history.back();return false;">Annuleren</button>
		</p>
	
	</form>
	
	
	
</body>
</html>