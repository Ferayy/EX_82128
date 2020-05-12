<!doctype html>
<html>
<head>
	<!-- Benodigde meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Overzichtspagina | Admin </title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
	<?php

	// 	Lees het config bestand uit.
	require_once( 'config/config.php' );

	// Lees het verwerken bestand uit.
	require_once( 'verwerken.php' );

	// Lees het sessie bestand uit.
	require_once( 'session/session.php' );

	?>

	<?php

	if ( isset( $_SESSION[ 'message' ] ) ): ?>
	<div class="alert alert-<?=$SESSION['msg_type']?>">
		<?php

		echo $_SESSION[ 'message' ];
		unset( $_SESSION[ 'message' ] );

		?>
	</div>
	<?php endif; ?>
	<div class="container">


		<?php

		ini_set( 'display_errors', 1 );
		ini_set( 'display_startup_errors', 1 );
		error_reporting( E_ALL );

		// Als het formulier is verstuurd
		if ( isset( $_POST[ 'submit' ] ) ) {
			// Lees de gegevens uit
			$Gebruikersnaam = $_POST[ 'Gebruikersnaam' ];
			$Wachtwoord = md5( $_POST[ 'Wachtwoord' ] );
			// Maak de Query
			$query = "SELECT * FROM EX_Admin WHERE Gebruikersnaam = '$Gebruikersnaam' AND Wachtwoord = '$Wachtwoord'";
			// Voer de Query uit en vang het resultaat op
			$resultaat = mysqli_query( $conn, $query );
			// Controleer of het resultaat een rij (user) heeft opgeleverd
			if ( !$resultaat || mysqli_num_rows( $resultaat ) > 0 ) {
				// Haal de user uit het resultaat
				$user = mysqli_fetch_array( $resultaat );
				// Zet de gebruikersnaam en level in 2 verschillende sessions
				$_SESSION[ 'Gebruikersnaam' ] = $user[ 'Gebruikersnaam' ];
				// Geef een melding
				echo "<p> Hallo $Gebruikersnaam, u bent ingelogd! </p>";
				echo "<p><a href='../'> Ga verder naar de overzichtspagina </a></p>";
			}

			// Als het resultaat leeg is
			else {
				echo "<p> Naam en/of wachtwoord zijn onjuist! </p>";
				echo "<p><a href='../'> Probeer opnieuw! </a></p>";
			}

		}

		?>

		<p> <a href="uitlog/"> Uitloggen </a> </p>

		<?php

		// Maak de query en selecteer alles in de tabel 'EX_Landen'.
		$resultaat = $conn->query( "SELECT * FROM EX_Landen" )or die( $conn->error );
		//$resultaat->fetch_assoc();
		?>
		<div class="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th> Land </th>
						<th> WG </th>
						<th> W </th>
						<th> G </th>
						<th> V </th>
						<th> DV </th>
						<th> DT </th>
						<th> Punten </th>
						<th colspan="2"> Action </th>
					</tr>
				</thead>
				<?php while ($rij = $resultaat->fetch_assoc()): ?>
				<tr>
					<td>
						<?php echo $rij['Land']; ?>
					</td>
					<td>
						<?php echo $rij['WG']; ?>
					</td>
					<td>
						<?php echo $rij['W']; ?>
					</td>
					<td>
						<?php echo $rij['G']; ?>
					</td>
					<td>
						<?php echo $rij['V']; ?>
					</td>
					<td>
						<?php echo $rij['DV']; ?>
					</td>
					<td>
						<?php echo $rij['DT']; ?>
					</td>
					<td>
						<?php echo $rij['Punten']; ?>
					</td>
					<td><a href="index.php?edit=<?php echo $rij['LAND_ID'] ?>" class="btn btn-info"> Edit </a> <a href="verwerken.php?delete=<?php echo $rij['LAND_ID'] ?>" class="btn btn-danger"> Delete </a>
					</td>
				</tr>
				<?php endwhile; ?>
			</table>
		</div>

		<!-- Het formulier. -->

		<div class="row justify-content-center">
			<form action="verwerken.php" method="POST">
				<input type="hidden" name="Land_ID" value="<?php echo $Land_ID ?>">
				<div class="form-group">
					<label> Land </label>
					<input class="form-control" type="text" name="Land" value="<?php echo $Land; ?>" placeholder="Vul land in">
				</div>
				<div class="form-group">
					<label> WG </label>
					<input class="form-control" type="text" name="WG" value="<?php echo $WG; ?>" placeholder="Vul WG in">
				</div>
				<div class="form-group">
					<label> W </label>
					<input class="form-control" type="text" name="W" value="<?php echo $W; ?>" placeholder="Vul W in">
				</div>
				<div class="form-group">
					<label> G </label>
					<input class="form-control" type="text" name="G" value="<?php echo $G; ?>" placeholder="Vul G in">
				</div>
				<div class="form-group">
					<label> V </label>
					<input class="form-control" type="text" name="V" value="<?php echo $V; ?>" placeholder="Vul V in">
				</div>
				<div class="form-group">
					<label> DV </label>
					<input class="form-control" type="text" name="DV" value="<?php echo $DV; ?>" placeholder="Vul DV in">
				</div>
				<div class="form-group">
					<label> DT </label>
					<input class="form-control" type="text" name="DT" value="<?php echo $DT; ?>" placeholder="Vul DT in">
				</div>
				<div class="form-group">
					<label> Punten </label>
					<input class="form-control" type="number" name="Punten" value="<?php echo $Punten; ?>" placeholder="Vul aantal punten in">
				</div>
				<div class="form-group">
					<?php
					if ( $update == true ):
						?>
					<button class="btn btn-info" type="submit" name="update"> Update </button>
					<?php else: ?>
					<button class="btn btn-primary" type="submit" name="submit"> Save </button>
					<?php endif; ?>
				</div>
			</form>
		</div>

		<!-- Einde van het formulier. -->

	</div>

	<!-- Optionele JavaScript -->
	<!-- jQuery, Popper en Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>