<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Productos</title>
    <p id="InstanceNumberText">Instancia No. #1</p>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Productos</h1>
    <br>
    <div>
    <a href='index.html'>Ingresar nuevo producto</a>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'config.php';

        // Obtener datos de la base de datos
        $sql = "SELECT id_producto, producto, cantidad, precio, total FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar datos en la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["producto"] . "</td>";
                echo "<td>" . $row["cantidad"] . "</td>";
                echo "<td>" . $row["precio"] . "</td>";
                echo "<td>" . $row["total"] . "</td>";
                echo "<td>
                        <a href='editar_producto.php?id=" . $row["id_producto"] . "'>Editar</a>
                        <a href='borrar_producto.php?id=" . $row["id_producto"] . "' onclick=\"return confirm('¿Estás seguro de que deseas borrar este producto?');\">Borrar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay productos disponibles</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    </div>
</body>
</html>
