<?php

// Lees de config bestand.
require_once( '../config/config.php' );

// Lees de sessie bestand.
require_once( '../session/session.php' );

?>
<!doctype html>
<html lang="nl">
	<head>
		<!-- Benodigde meta tag(s) -->
		<meta charset="UTF-8">

		<!-- Bootstrap CSS. -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title> Overzichtspagina | Gebruikers </title>

		<!-- Eigen CSS -->
		<link rel="stylesheet" href="../CSS/detail.css">
	</head>

	<body>

		<header>

			<!-- Navigatie. -->

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="./"> Het EK voetbal </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>



				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="../uitlog/"> Uitloggen </a>
						</li>
					</ul>
				</div>
			</nav>

		</header>
		
		<!-- Einde navigatie. -->

		<h1 class="mt-3"> De overzichtspagina </h1>
		<h2> Alle huidige poules </h2>
		
		<?php
		
		$Gebruikersnaam = $_SESSION['Gebruikersnaam'];
		
		// Geef een melding
		echo "<p> Hallo $Gebruikersnaam, u bent ingelogd! </p>";
		
		?>
		

		<br><br>

		<?php

		// Zoek in de database.
		$resultaat = mysqli_query( $conn, "SELECT * FROM EX_Landen" );
		$resultaat2 = mysqli_query( $conn, "SELECT * FROM EX_Users" );
		
		// Start de tabel.
		echo '<table>';

		// Toon de cellen met data.
		echo "<tr>";
		echo "<th>Landen Poule 1</th>";
		echo "<th>WG</th>";
		echo "<th>W</th>";
		echo "<th>G</th>";
		echo "<th>V</th>";
		echo "<th>DV</th>";
		echo "<th>DT</th>";
		echo "<th>Punten</th>";
		echo "</tr>";

		// Lees alle gevonden records.
		while ( $rij = mysqli_fetch_array( $resultaat ) ) {

			echo "<tr>";
			echo "<td>" . $rij[ 'Land' ] . "</td>";
			echo '<td>' . $rij[ 'WG' ] . '</td>';
			echo '<td>' . $rij[ 'W' ] . '</td>';
			echo '<td>' . $rij[ 'G' ] . '</td>';
			echo '<td>' . $rij[ 'V' ] . '</td>';
			echo '<td>' . $rij[ 'DV' ] . '</td>';
			echo '<td>' . $rij[ 'DT' ] . '</td>';
			echo '<td>' . $rij[ 'Punten' ] . '</td>';
			echo "</tr>";

		}

		// Sluit de tabel af.
		echo '</table>';


		?>
		
		<!-- <p> Kies jouw poule! </p> -->
		
		
		<form action="../pouleverwerk/" method="POST">
			
			<p> Kies jouw land! </p>
			
				<select name="Land">
					
					<?php
					
					$resultaat = mysqli_query( $conn, "SELECT * FROM EX_Landen" );
					while ( $rij = mysqli_fetch_array( $resultaat )) {
						?>
					<option value="<?php echo($rij['LAND_ID']);?>">
						<?php echo($rij['Land']);?>
					</option>
					
					<?php
						
					}
					
					?>

				</select>
			
			<input type="submit" name="submit" id="submit" value="submit">
			
		</form>

		<!-- Optionele JavaScript -->
		<!-- JQuery, Popper en Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>
</html>