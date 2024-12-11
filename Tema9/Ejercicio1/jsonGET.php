<?php
// Para solicitudes de otros dominios.
header("access-control-allow-origin: *");

try {
    // nombre fuente de datos
    $server = 'localhost';
    $db = 'tema10';

    $dsn = "mysql:host=" . $server . ";dbname=" . $bd;

    $user = 'root';
    $pass = '';

    // realizo la conexión
    $pdo = new PDO($dsn, $user, $pass);

    // paso id
    $id = $_GET['id'];

    // hago consulta
    $stmt = $pdo->prepare(`SELECT * FROM datos WHERE id=:id`);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->fetchColumn();
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt;
    
} catch (PDOException $e) {

    // error de  base de datos
    echo '<h2>ERROR BASE DE DATOS</h2>';
    echo "<HR>";
    echo 'Mensaje:      ' . $e->getMessage() . ' < BR >';
    echo 'Código:       ' . $e->getCode() . ' < BR >';
    echo 'Fichero:      ' . $e->getFile() . ' < BR >';
    echo 'Línea:        ' . $e->getLine() . ' < BR >';
    echo 'Trace:        ' . $e->getTraceAsString() . ' < BR >';

    // cierro conexión
    $pdo = null;

    // cancelo ejecución programa
    
    exit();

}