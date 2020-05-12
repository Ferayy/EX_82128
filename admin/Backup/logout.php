<?php
// start de sessie
session_start();

// vernietig de sessie
session_destroy();

// ga naar de inlogpagina
header('Location:adminlog.php');

?>