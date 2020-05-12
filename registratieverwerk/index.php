<?php
// Start de sessie.
session_start();
// Regenereer de sessie ID.
session_regenerate_id();
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Registratie | Verwerk </title>
</head>

<body>
	<?php

	ini_set( 'display_errors', 1 );
	ini_set( 'display_startup_errors', 1 );
	error_reporting( E_ALL );

	// Controleer of je iets binnen krijgt uit een submit.
	if ( isset( $_POST[ 'submit' ] ) ) {
		// Controleer of de user de juiste token heeft.
		if ( isset( $_SESSION[ 'token' ] ) && $_SESSION[ 'token' ] == $_POST[ 'csrf_token' ] ) {
			// Controleer of de user van de correcte url komt.
			$url = "../registratie/";
			if ( isset( $_SERVER[ "HTTP_REFERER" ] ) == $url ) {
				// Lees alle formuliervelden.
				$Gebruikersnaam = $_POST[ 'Gebruikersnaam' ];
				$Voornaam = $_POST[ 'Voornaam' ];
				$Achternaam = $_POST[ 'Achternaam' ];
				$Emailadres = $_POST[ 'Emailadres' ];
				$Wachtwoord = $_POST[ 'Wachtwoord' ];
				// Controleer of alle formulieren waren ingevuld.
				if ( strlen( $Gebruikersnaam ) > 0 && strlen( $Voornaam ) > 0 && strlen( $Achternaam ) > 0 && strlen( $Emailadres ) > 0 && strlen( $Wachtwoord ) > 0 ) {

					// AUTO MAILER!

					// Het bericht.
					$msg = "Bedankt voor het deelnemen aan de poule.\nHierbij uw inloggegevens:\n$Gebruikersnaam, $Wachtwoord)";

					// Specificeer de maximale lengte van het bericht.
					$msg = wordwrap( $msg, 70 );

					// Verstuur de e-mail.
					mail( $Emailadres, "Inloggegevens", $msg );

					// Einde Auto Mailer bij registratie van de poule door de gebruiker.

					// Lees het config-bestand.
					require_once( '../config/config.php' );

					// Versleutel het wachtwoord.
					$Wachtwoord = md5( $Wachtwoord );
					// Maak de controle query.
					$query = "SELECT * FROM EX_User
									WHERE Gebruikersnaam = '$Gebruikersnaam'";
					// Voer de query uit.
					$resultaat = mysqli_query( $conn, $query );
					// Het ophalen van de clients IP-adres.
					$server = $_SERVER[ "REMOTE_ADDR" ];
					$_SESSION[ "IP" ] = $server;
					//Controleer of de inlog correct was.
					if ( mysqli_num_rows( $resultaat ) == 1 ) {
						// Als de user al voorkomt, stuur de gebruiker dan terug naar de registratie pagina.
						header( "Location:../registratie/" );

					} else {

						$info = mysqli_fetch_array( $resultaat );
						$_SESSION[ 'ip' ] = $_SERVER[ 'REMOTE_ADDR' ];
						$_SESSION[ 'Gebruikersnaam' ] = $Gebruikersnaam;
						if ( $Gebruikersnaam == $Gebruikersnaam ) {
							$query = "INSERT INTO EX_Users (`Gebruikersnaam`, `Voornaam`, `Achternaam`, `Emailadres`, `Wachtwoord`) VALUES ('$Gebruikersnaam', '$Voornaam', '$Achternaam', '$Emailadres', '$Wachtwoord')";
							$resultaat = mysqli_query( $conn, $query );

							// Stuur de gebruiker terug naar de inlogpagina.
							header( "Location:../inlog/" );
						}
					}
				} else {
					echo "<p>Niet alle velden zijn ingevuld!</p>";
				}
			}
		} else {
			echo "<p>U heeft het formulier niet ingevuld.</p>";
		}
	} else {
		echo "<p>Wij hebben helaas geen data binnen gekregen.</p>";
	}
	?>
</body>
</html>