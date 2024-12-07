<?php
require_once 'functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$producto =obtenerProductoPorId($_GET['id']);
if (!$producto) {
    header("Location: index.php?mensaje=producto no encontrado");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarProducto($_GET['id'],
        $_POST['nombre'],
        $_POST['precio'],
        $_POST['descripcion'],
        $_POST['categoria'],
        isset($_POST['disponible']))? 'si' : 'no';
    if ($count > 0) {
        header("Location: index.php?mensaje=producto actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el producto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required>
        <label>Descripción:</label>
        <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>" required>
        <select name="categoria" id="producto_lacteo">
          <option value="leche">Leche</option>
          <option value="yogur">Yogur</option>
          <option value="queso">Queso</option>
          <option value="mantequilla">Mantequilla</option>
          <option value="crema">Crema</option>
          <option value="helado">Helado</option>
        </select>
        <label>Disponible:</label>
        <input type="checkbox" name="disponible" <?php echo $producto['disponible'] ? 'checked' : ''; ?>>
        <button type="submit">Actualizar Producto</button>
        <a href="../Productos/index.php" type="submit">Volver</a>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
