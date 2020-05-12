<?php

// Start de sessie
session_start();

// Vernietig de sessie
session_destroy();

// Ga terug naar de inlog pagina
header('Location:../inlog/');

?>