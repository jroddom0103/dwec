<?php

header('access-control-allow-origin: *');

$nombre = $_GET['nombre'];
$ciudad = $_GET['ciudad'];

echo '{"nombre":"'.$nombre.'","ciudad":"'.$ciudad.'"}';