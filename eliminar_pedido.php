<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pedidos_eliminar'])) {
        $pedidos_eliminar = $_POST['pedidos_eliminar'];

        $pedidos = file_get_contents('pedidos.txt');
        $pedidos_array = explode("\n\n", $pedidos);

        $nuevos_pedidos = [];
        $pedidos_eliminados = 0;

        foreach ($pedidos_array as $pedido) {
            $info = explode("\n", $pedido);
            $numero_pedido_actual = null;

            foreach ($info as $line) {
                list($key, $value) = explode(': ', $line);
                if ($key === 'Número de Pedido') {
                    $numero_pedido_actual = $value;
                }
            }

            if ($numero_pedido_actual !== null && in_array($numero_pedido_actual, $pedidos_eliminar)) {
                $pedidos_eliminados++;
            } else {
                $nuevos_pedidos[] = $pedido;
            }
        }

        if ($pedidos_eliminados > 0) {
            file_put_contents('pedidos.txt', implode("\n\n", $nuevos_pedidos));
            echo "Se eliminaron $pedidos_eliminados pedidos con éxito.";
        } else {
            echo "No se encontraron pedidos para eliminar.";
        }
    } else {
        echo "No se seleccionaron pedidos para eliminar.";
    }
} else {
    echo "Acceso no permitido.";
}
?>