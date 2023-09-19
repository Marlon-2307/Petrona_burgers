<?php
// Lee el contenido de pedidos.txt y lo almacena en $pedidos_array
$pedidos_array = file('pedidos.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&display=swap" rel="stylesheet">
    <title>Listado de Pedidos</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h1>Pedidos Petrona Burger's.</h1>

    <?php
    // $pedidos_array contiene la información de los pedidos
    $imagen_path = ''; // Inicializa la variable
    $total_pedido = 0;

    // Precios de los productos
    $precios = [
        'Hamburguesas' => 10000,
        'Bebidas' => 5000,
        'Acompañantes' => 5000
    ];

    echo '<form action="eliminar_pedido.php" method="post">'; // Formulario para eliminar pedidos
    echo '<table border="1">';
    foreach ($pedidos_array as $pedido_info) {
        if (!empty($pedido_info)) {
            $pedido_info = explode("\n", $pedido_info);

            foreach ($pedido_info as $info) {
                list($key, $value) = explode(': ', $info);

                if (array_key_exists($key, $precios)) {
                    $precio_unitario = $precios[$key];
                    $cantidad = (int)$value;
                    $total_producto = $precio_unitario * $cantidad;
                    $total_pedido += $total_producto;
                }

                if ($key === 'Firma o Foto del Cliente') {
                    $imagen_path = $value; // Asigna la ruta de la imagen
                }

                if ($key === 'Número de Pedido') {
                    if (!empty($imagen_path)) {
                        echo "<tr><td colspan='2'><img src='$imagen_path' alt='Firma o Foto del Cliente'></td></tr>";
                    }
                    if ($total_pedido > 0) {
                        echo "<tr><td colspan='2'>Total del Pedido: $total_pedido</td></tr>";
                    }
                    echo "</table>";
                    echo "<h2>Número de Pedido: $value</h2>";
                    echo '<input type="checkbox" name="pedidos_eliminar[]" value="'.$value.'">'; // Casilla de verificación
                    echo '<br>'; // Agregar un salto de línea
                    $total_pedido = 0;
                    $imagen_path = ''; // Reinicia la variable
                    echo '<table border="1">';
                } else {
                    if ($key !== 'No se proporcionó una imagen.' && $key !== 'Total Cancelar: 0') {
                        echo "<tr><td><strong>$key</strong></td><td>$value</td></tr>";
                    }
                }
            }
        }
    }

    if (!empty($imagen_path)) {
        echo "<tr><td colspan='2'><img src='$imagen_path' alt='Firma o Foto del Cliente'></td></tr>";
    }
    if ($total_pedido > 0) {
        echo "<tr><td colspan='2'>Total del Pedido: $total_pedido</td></tr>";
    }
    echo "</table>";
    echo '<input type="submit" value="Eliminar Pedidos">'; // Botón de eliminar
    echo '</form>';
    ?>

</body>
</html>