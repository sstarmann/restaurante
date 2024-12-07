<?php
require_once __DIR__ . '/functions.php';
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarProducto($_GET['id']);
    $mensaje = $count > 0 ? "Producto eliminado con éxito." : "No se pudo eliminar el Producto.";
}
$productos = obtenerProducto();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lista de Productos</title>
</head>
<body>
<center><div class ="container">
    <h1>Lista de Productos</h1>
    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    <a href="nuevo.php">Añadir Nuevo Producto</a>
    </div>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Disponible</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            <td><?php echo htmlspecialchars($producto['precio']); ?></td>
            <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
            <td><?php echo htmlspecialchars($producto['categoria']); ?></td>
            <td><?php echo $producto['disponible'] ? 'Sí' : 'No'; ?></td>
            <td class ="actions"> 
                <a href="editar.php?id=<?php echo $producto['_id']; ?>" class ="btn btn-outline-warning">Editar</a>
                <a href="index.php?accion=eliminar&id=<?php echo $producto['_id']; ?>" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar el producto?');">Eliminar</a>           
            </td>
        </tr>
        <?php endforeach; ?>
    </table></center>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
