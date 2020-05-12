<?php

	// Lees het config bestand uit.
	require_once('../config/config.php');

	$Keuze = $_POST['Land'];

	// Als het formulier is ingevuld.
	if(isset($_POST['submit'])){
		
		// Als de keuze variabele niet leeg is.
		if(!empty($Keuze)){
			// Query die de toevoeging verricht.
			$conn->query("UPDATE EX_Landen SET Keuze='$Keuze' WHERE LAND_ID=$Land_ID"); 
		}
			
		else{
			
			echo("Er is geen data!");
			
		}
		
	
}
	

?>