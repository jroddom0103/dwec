<?php

// jsonGET.php

// Para solicitudes de otros dominios.
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

//................................................

$nombre = $_GET['nombre'];
$ciudad = $_GET['ciudad'];

// Devuelve JSON

echo '{"nombre":"'.$nombre.'","ciudad":"'.$ciudad.'"}';
?>