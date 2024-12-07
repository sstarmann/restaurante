<?php

require_once __DIR__ . '/../vendor/autoload.php';
    
$mongoClient = new MongoDB\Client("mongodb+srv://73571574:73571574@cluster1.mnhaq.mongodb.net/?retryWrites=true&w=majority&appName=Cluster1");
//$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase('restaurante');
$clientesCollection = $database->clientes;
$productoCollection = $database->productos;
$pedidosCollection = $database->pedidos;
?>
