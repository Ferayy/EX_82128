<?php

    // Lees de config bestand.
    require_once ('../config/config.php');
    // Lees de sessie bestand.
    require_once ('../session/session.php');

?>
<!doctype html>
<html lang="nl">
<head>
    <!-- Benodigde meta tag(s) -->
	<meta charset="UTF-8">

	<title> Overzichtspagina | Gebruikers </title>

    <!-- Eigen CSS -->
	<link rel="stylesheet" href="../CSS/detail.css">
</head>

<body>

	<h1> De overzichtspagina </h1>
	<a href="../uitlog/"> Uitloggen </a>

	<br><br>

	<?php

	// Zoek in de database.
	$resultaat = mysqli_query( $conn, "SELECT * FROM EX_Landen" );

	// Start de tabel.
	echo '<table>';

	// Toon de cellen met data.
	echo "<tr>";
	echo "<th>Land</th>";
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

</body>
</html>