<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['calzado']) || empty($_POST['precio']) || empty($_POST['talla']) || empty($_POST['descuento'])) {
        echo "Por favor llenar todos los campos, gracias";
    } else {
        $calzado = $_POST['calzado'];
        $precio = $_POST['precio'];
        $talla = $_POST['talla'];
        $descuento = $_POST['descuento'];

        // Verifica si se subió una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            $query = "INSERT INTO productos (calzado, precio, talla, descuento, imagen) VALUES ('$calzado', '$precio', '$talla', '$descuento', '$imagen')";

            $resultado = $conexion->query($query);

            if ($resultado) {
                echo "Se guardó correctamente";
            } else {
                echo "Error al guardar en la base de datos: " . $conexion->error;
            }
        } else {
            echo "Por favor, seleccione una imagen válida.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>           
    <title>CM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <center> 
        <h1>CALZADO MILAGROS</h1>
        <form method="POST" enctype="multipart/form-data">
            <h1>Ingrese los Productos</h1>
            <label>Calzado: </label>
            <input type="text" name="calzado"><br><br>
            <label>Precio: </label>
            <input type="text" name="precio"><br><br>
            <label>Talla: </label>
            <input type="text" name="talla"><br><br>
            <label>Descuento: </label>
            <input type="text" name="descuento"><br><br>
            <label>Imagen: </label>
            <input type="file" name="imagen" required=""><br><br>
            <center>
                <input type="submit" name="guardar" value="Guardar">
                <button><a href="consultar.php">Consultar</a></button>
            </center>
        </form>
    </center>              
</body>
</html>
