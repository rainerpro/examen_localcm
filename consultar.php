<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DATOS CM</title>
    <link rel="stylesheet" href="stylecon.css">
    <script>
        function editarPrecio(idProducto) {
            var nuevoPrecio = prompt("Ingrese el nuevo precio:");
            if (nuevoPrecio !== null) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                        location.reload();
                    }
                };
                xhr.open("POST", "editar.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("id_producto=" + idProducto + "&nuevo_precio=" + nuevoPrecio);
            }
        }
    </script>
</head>
<body>
    <center>
        <h1>CONSULTA DE DATOS </h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Calzado</th>
                <th>Precio</th>
                <th>Talla</th>
                <th>Descuento</th>
                <th>Imagen</th>
                <th>Editar Precio</th>
            </tr>
            <?php
            $conexion = mysqli_connect("localhost", "root", "", "examen");
            $query = mysqli_query($conexion, "SELECT * FROM productos");
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['Calzado'] . "</td>";
                echo "<td>$" . $row['Precio'] . "</td>";
                echo "<td>" . $row['Talla'] . "</td>";
                echo "<td>" . $row['Descuento'] . "</td>";
                echo "<td><img src='data:image/jpg;base64," . base64_encode($row['imagen']) . "' alt='Imagen del producto'></td>";
                echo "<td>";
                echo "<button onclick='editarPrecio(" . $row['id'] . ")'>Editar</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div class="button-container">
        <button><a href="index.php" style="color: white; text-decoration: none;">Regresar</a></button>
        <button><a href="consultadestal.php" style="color: white; text-decoration: none;">Consultar Descuentos y Tallas</a></button>
        </div>
        </center>
</body>
</html>