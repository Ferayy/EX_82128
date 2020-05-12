<?php
    // Het starten van de sessie.
    session_start();
    // Het regenereren van de sessie ID.
    session_regenerate_id();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title> Inlog Verwerk </title>
</head>

<body>
	<?php
	
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
	
	
		// Als het formulier is verstuurd
		if (isset($_POST['submit']))
		{
			// Voeg de databaseconnectie toe
			require_once('../config/config.php');
			// Lees de gegevens uit
			$Gebruikersnaam = $_POST['Gebruikersnaam'];
			$Wachtwoord = md5($_POST['Wachtwoord']);
			// Maak de Query
			$query = "SELECT * FROM EX_Users WHERE Gebruikersnaam = '$Gebruikersnaam' AND Wachtwoord = '$Wachtwoord'";
			// Voer de Query uit en vang het resultaat op
			$resultaat = mysqli_query($conn, $query);
			// Controleer of het resultaat een rij (user) heeft opgeleverd
			if (!$resultaat || mysqli_num_rows($resultaat) > 0)
			{
				// Haal de user uit het resultaat
				$user = mysqli_fetch_array($resultaat);
				// Zet de gebruikersnaam en level in 2 verschillende sessions
				$_SESSION['Gebruikersnaam'] = $user['Gebruikersnaam'];
				// Geef een melding
				echo "<p> Hallo $Gebruikersnaam, u bent ingelogd! </p>";
				echo "<p><a href='../overzicht'> Ga verder naar de overzichtspagina </a></p>";
			}
			
			// Als het resultaat leeg is
			else
			{
				echo "<p> Naam en/of wachtwoord zijn onjuist! </p>";
				echo "<p><a href='../inlog/'> Probeer opnieuw! </a></p>";
			}
			
		}
		
		?>
</body>
</html>
