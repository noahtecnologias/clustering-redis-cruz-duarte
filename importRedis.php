<?php
require 'Predis/Autoloader.php';
Predis\Autoloader::register();

// Establecer la conexión a Redis
$redis = new Predis\Client();

// Leer el archivo CSV
$csvFile = fopen('datos.csv', 'r');
$header = fgetcsv($csvFile);

// Recorrer cada línea del archivo CSV
while (($row = fgetcsv($csvFile)) !== false) {
    // Obtener los valores de cada columna
    $idCliente = $row[0];
    $edad = $row[1];
    $idProducto = $row[2];
    $idMarca = $row[3];
    $monto = $row[4];

    // Construir el hash con los datos
    $data = [
        'edad' => $edad,
        'id_producto' => $idProducto,
        'id_marca' => $idMarca,
        'monto' => $monto,
    ];

    // Insertar los datos en Redis utilizando el comando HMSET
    $redis->hmset($idCliente, $data);
}

fclose($csvFile);

echo "Datos cargados exitosamente en Redis.";
?>
