<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarProducto($_POST['nombre'],$_POST['precio'],$_POST['descripcion'],$_POST['categoria'],$disponible = isset($_POST['disponible']) ? 'si' : 'no');
if ($id) {
    header("Location: index.php?mensaje=Producto creado con éxito");
    exit;
} else {
    $error = "No se pudo crear al Producto.";
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Añadir Producto</title>
</head>
<body>
    <h1>Añadir Nuevo Producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <label>Categoría:</label>
        <select type = "text" name="categoria" id="producto_lacteo">
            <option value="leche">Leche</option>
            <option value="yogur">Yogur</option>
            <option value="queso">Queso</option>
            <option value="mantequilla">Mantequilla</option>
            <option value="crema">Crema</option>
            <option value="helado">Helado</option>
        </select>
        <label>Disponible:</label>
        <input type="checkbox" name="disponible">
        <button type="submit">Añadir Producto</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
