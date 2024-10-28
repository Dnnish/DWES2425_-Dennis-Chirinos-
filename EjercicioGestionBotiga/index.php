<?php
require_once 'funcions.php';

/* Inicializa datos y lógica de productos y categorías */
$producte1 = crearProducte('Samarreta', 'Samarreta de cotó', 19.99);
$producte2 = crearProducte('Pantalons', 'Pantalons vaquer', 39.99);
$categoria1 = crearCategoria('Roba', 'Secció de roba');
$categoria2 = crearCategoria('Home', 'Productes per a home');

agregarCategoriaAProducte($producte1, $categoria1);
agregarCategoriaAProducte($producte1, $categoria2);
agregarCategoriaAProducte($producte2, $categoria1);

$categorias = [$categoria1, $categoria2];
$productos = [$producte1, $producte2];
$productos_mostrados = "";
$producto_detalles = "";

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mostrar productos según la categoría seleccionada
    if (isset($_POST['categoria'])) {
        $eleccion = (int)$_POST['categoria'];

        if ($eleccion) {
            $productos_mostrados = mostrarProductes($categorias, $eleccion);
        } else {
            $productos_mostrados = "Por favor, selecciona una categoría.";
        }
    }

    // Crear nuevo producto
    if (isset($_POST['nombreProducto']) && isset($_POST['precioProducto']) && isset($_POST['descripcionProducto']) && isset($_POST['categoriaProducto'])) {
        $nombreProd = $_POST['nombreProducto'];
        $precioProd = $_POST['precioProducto'];
        $descripcionProd = $_POST['descripcionProducto'];
        $categoriaSeleccionada = (int)$_POST['categoriaProducto'];

        // Crear y agregar el nuevo producto a la categoría seleccionada
        $nuevoProducto = crearProducte($nombreProd, $descripcionProd, (float)$precioProd);
        if (isset($categorias[$categoriaSeleccionada - 1])) {
            agregarCategoriaAProducte($nuevoProducto, $categorias[$categoriaSeleccionada - 1]);
        }
        $productos[] = $nuevoProducto;
    }

    // Crear nueva categoría
    if (isset($_POST['nombreCategoria'])) {
        $nombreCat = $_POST['nombreCategoria'];
        $descripcionCat = isset($_POST['descripcionCategoria']) ? $_POST['descripcionCategoria'] : 'Descripción de ' . $nombreCat; // Descripción predeterminada

        $nuevaCategoria = crearCategoria($nombreCat, $descripcionCat);
        $categorias[] = $nuevaCategoria;
    }

    // Mostrar detalles del producto ingresado
    if (isset($_POST['nombreProductoDetalles'])) {
        $nombreProductoDetalles = $_POST['nombreProductoDetalles'];
        foreach ($productos as $producto) {
            if ($producto->getNom() === $nombreProductoDetalles) {
                $producto_detalles = $producto->mostrarCaracteristicas();
                break;
            }
        }
        if (empty($producto_detalles)) {
            $producto_detalles = "Producto no encontrado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Tienda Online - Selección de Categorías</h1>
</header>
<div class="container">
    <!-- Contenido de la tienda -->
    <!-- Formulario para seleccionar una categoría -->
    <form action="index.php" method="POST">
        <h2>Selecciona una Categoría</h2>
        <!-- Opciones de categorías -->
        <?php foreach ($categorias as $index => $categoria): ?>
            <label>
                <input type="radio" name="categoria" value="<?php echo $index + 1; ?>" <?php echo (isset($eleccion) && $eleccion == $index + 1) ? 'checked' : ''; ?>> <?php echo $categoria->getNom(); ?>
            </label><br>
        <?php endforeach; ?>
        <button type="submit">Mostrar Productos</button>
    </form>

    <div class="productos">
        <h2>Productos en la Categoría Seleccionada</h2>
        <label><?php echo $productos_mostrados; ?></label>
    </div>

    <div>
        <h2>Crear productos</h2>
        <form action="index.php" method="POST">
            <input type="text" name="nombreProducto" placeholder="Nombre del Producto" required>
            <input type="text" name="descripcionProducto" placeholder="Descripción del Producto" required>
            <input type="number" name="precioProducto" placeholder="Precio" step="0.01" required>
            <!-- Selección de la categoría para el nuevo producto -->
            <select name="categoriaProducto" required>
                <option value="">Selecciona una Categoría</option>
                <?php foreach ($categorias as $index => $categoria): ?>
                    <option value="<?php echo $index + 1; ?>"><?php echo $categoria->getNom(); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Añadir</button>
        </form>
    </div>

    <div>
        <h2>Crear Categoría</h2>
        <form action="index.php" method="POST">
            <input type="text" name="nombreCategoria" placeholder="Nombre de la Categoría" required>
            <input type="text" name="descripcionCategoria" placeholder="Descripción de la Categoría">
            <button type="submit">Crear Categoría</button>
        </form>
    </div>

    <div class="producto-detalles">
        <h2>Detalles del Producto</h2>
        <form action="index.php" method="POST">
            <input type="text" name="nombreProductoDetalles" placeholder="Nombre del Producto" required>
            <button type="submit">Mostrar Detalles</button>
        </form>
        <div>
            <?php echo $producto_detalles; ?>
        </div>
    </div>
</div>
<footer>
    <p>© 2024 Tienda Online. Todos los derechos reservados.</p>
</footer>
</body>
</html>
