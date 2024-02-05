<?php
require_once('conexion.php');

$queryDescuentos = "SELECT DISTINCT Descuento FROM productos";
$resultadoDescuentos = $conexion->query($queryDescuentos);

$queryTallas = "SELECT DISTINCT Talla FROM productos";
$resultadoTallas = $conexion->query($queryTallas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Descuentos y Tallas CM</title>
    <link rel="stylesheet" href="stylecon.css">
</head>
<body>
    <center>
        <h1>DESCUENTOS Y TALLAS</h1>
        
        <h2>Descuentos</h2>
        <table border="1">
            <tr>
                <th>Descuento</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($resultadoDescuentos)) {
                echo "<tr>";
                echo "<td>" . $row['Descuento'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <h2>Tallas</h2>
        <table border="1">
            <tr>
                <th>Talla</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($resultadoTallas)) {
                echo "<tr>";
                echo "<td>" . $row['Talla'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>


        <div class="button-container">
            <button><a href="index.php" style="color: white; text-decoration: none;">Ingresar Datos</a></button>
            <button><a href="consultar.php" style="color: white; text-decoration: none;">Consultar Datos</a></button>
        </div>
    
    </center>
</body>
</html>
