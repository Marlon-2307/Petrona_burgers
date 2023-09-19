<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&display=swap" rel="stylesheet">
    <title>Petrona Burger's.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Petrona Burger's.</h1>
        <nav>
            <ul>
                <li><a href="#menu">Delivery</a></li>
                <li><a href="listado_pedidos.php">Pedidos</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="container">
        
    <section id="intro">
        <h2>La mejor hamburguesa en la ciudad</h2>
        <p>¡Ven y prueba nuestras hamburguesas hechas con ingredientes frescos y deliciosos!</p>
        <div>
        <p>En el corazón de la ciudad, se alzaba majestuoso "Petrona Burgers". 
            Este icónico local no era solo un lugar para satisfacer el hambre, era una experiencia culinaria e inigualable.</p>
            <img src="ImgFrente/burgers.webp" alt="#">
   
    </section>
   
     
    
    <section class="pedido" id="menu">
    <h2>Realizar Pedido</h2>
    <form action="procesar_pedido.php" method="post" enctype="multipart/form-data">
        <label for="numero_pedido">Número de Pedido:</label>
        <input type="text" id="numero_pedido" name="numero_pedido" required><br><br>

        <label for="cedula_cliente">Cédula del Cliente:</label>
        <input type="text" id="cedula_cliente" name="cedula_cliente" required><br><br>

        <label for="hamburguesas">Hamburguesas <span> $10000 C.U</span></label>
        <input type="number" id="hamburguesas" name="hamburguesas" min="1" required><br><br>

        <label for="bebidas">Bebidas <span> $5000 C.U</span></label>
        <input type="number" id="bebidas" name="bebidas" min="1" required><br><br>

        <label for="acompanantes">Acompañantes <span> $5000 C.U</span></label>
        <input type="number" id="acompanantes" name="acompanantes" min="1" required><br><br>

        <label for="firma_cliente">Firma o Foto del Cliente:</label>
        <input type="file" id="firma_cliente" name="firma_cliente" accept="image/*" required><br><br>

        <input type="submit" value="Enviar Pedido">
    </form>
</section>
    
     </section>
        
    <footer>
        <div class="contacto" id="contacto">
        <h2>Contacto</h2>
        <p>Contactanos al teléfono:[+57 3006051010] .</p>
        <p>Correo electrónico: [pedidos@petronaburgers.com]</p>
        </div>
        <p>&copy; 2023 Petrona Burger's</p>
    </footer>
</body>
</html>