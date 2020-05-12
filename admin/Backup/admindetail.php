<?php
	require_once '../config.php';
	require_once '../session.php';
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title> Admin </title>
<link rel="stylesheet" href="../CSS/detail.css">

</head>

<body>
<h1>Welkom Admin</h1>
<a href="../logout/">Uitloggen</a> <br>
<br>
<?php

// Zoek in de database
	$resultaat = mysqli_query( $conn, "SELECT * FROM EX_Landen" );

	// Start de tabel
	echo '<table>';

	// Toon de cellen met data
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

	// Lees alle gevonden records
	while ($rij = mysqli_fetch_array($resultaat)) {

		echo "<tr>";
		echo "<td>" . $rij[ 'Land' ] . "</td>";
		echo '<td>' . $rij[ 'WG' ] . '</td>';
		echo '<td>' . $rij[ 'W' ] . '</td>';
		echo '<td>' . $rij[ 'G' ] . '</td>';
		echo '<td>' . $rij[ 'V' ] . '</td>';
		echo '<td>' . $rij[ 'DV' ] . '</td>';
		echo '<td>' . $rij[ 'DT' ] . '</td>';
		echo '<td>' . $rij[ 'Punten' ] . '</td>';
		echo "<td><a href='adminbewerk.php?id=" . $rij['LAND_ID'] . "'> Adjust </a></td>";
		echo "</tr>";

	}

	// Sluit de tabel af
	echo '</table>';
	?>

</body>
</html>