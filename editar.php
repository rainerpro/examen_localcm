<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexion = mysqli_connect("localhost", "root", "", "examen");

    $id_producto = $_POST['id_producto'];
    $nuevo_precio = $_POST['nuevo_precio'];

    $query = "UPDATE productos SET Precio = '$nuevo_precio' WHERE id = $id_producto";
    $resultado = $conexion->query($query);

    if ($resultado) {
        echo "Precio actualizado correctamente";
    } else {
        echo "Error al actualizar el precio: " . $conexion->error;
    }
}
?>
