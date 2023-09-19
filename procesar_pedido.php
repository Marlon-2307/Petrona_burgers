<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopilación de datos del formulario
    $numero_pedido = $_POST['numero_pedido'];
    $cedula_cliente = $_POST['cedula_cliente'];
    $cantidad_hamburguesas = $_POST['hamburguesas'];
    $cantidad_bebidas = $_POST['bebidas'];
    $cantidad_acompanantes = $_POST['acompanantes'];

    // Manejo de la imagen
    $firma_cliente = $_FILES['firma_cliente'];
    $imagen_path = "uploads/" . $firma_cliente['name']; // Define la ubicación y nombre del archivo en tu servidor

    if (move_uploaded_file($firma_cliente['tmp_name'], $imagen_path)) {
        // Guardar la información en un archivo de texto
        $pedido_info = "Número de Pedido: $numero_pedido\n" .
                        "Cédula del Cliente: $cedula_cliente\n" .
                        "Hamburguesas: $cantidad_hamburguesas\n" .
                        "Bebidas: $cantidad_bebidas\n" .
                        "Acompañantes: $cantidad_acompanantes\n" .
                        "Firma o Foto del Cliente: $imagen_path\n\n";

        file_put_contents('pedidos.txt', $pedido_info, FILE_APPEND);

        echo "¡Pedido registrado con éxito!";
    } else {
        echo "Error al subir la imagen.";
    }
} else {
    echo "Acceso no permitido.";
}
?>