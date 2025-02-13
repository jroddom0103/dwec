<?php
header("access-control-allow-origin: *");

try {
    //Definición de variables
    $server = 'localhost';
    $bd = 'tema9';

    $dsn = "mysql:host=" . $server . ";dbname=" . $bd;

    $user = 'root';
    $pass = '';

    //Establecimiento de conexión
    $pdo = new PDO($dsn, $user, $pass);

    //Verificación del id
    if (isset($_GET['id'])) {
        //Consulta para obtener los detalles del nombre por id
        $id = $_GET['id'];
        $sql = "SELECT id, nombre, apellidos, ciudad FROM datos WHERE id=:id";

        //Preparación y ejecución de la consulta
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        //Fetch
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            //Devuelve los detalles en formato JSON
            echo json_encode($data); 
        } else {
            echo json_encode(['error' => 'No se encontró el registro.']);
        }
    } else {
        //Consulta para obtener todos los nombres
        $sql = "SELECT id, nombre FROM datos";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //Obtención de todos los resultados
        $nombres = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($nombres) {
            //Devuelve todos los nombres en formato JSON
            echo json_encode($nombres); 
        } else {
            echo json_encode(['error' => 'No se encontraron nombres.']);
        }
    }
    
} catch (PDOException $e) {

    //Error de base de datos
    echo '<h2>ERROR BASE DE DATOS</h2>';
    echo "<HR>";
    echo 'Mensaje:      ' . $e->getMessage() . ' < BR >';
    echo 'Código:       ' . $e->getCode() . ' < BR >';
    echo 'Fichero:      ' . $e->getFile() . ' < BR >';
    echo 'Línea:        ' . $e->getLine() . ' < BR >';
    echo 'Trace:        ' . $e->getTraceAsString() . ' < BR >';

    //Cierre de conexión
    $stmt = null;
    $pdo = null;

    exit();

}