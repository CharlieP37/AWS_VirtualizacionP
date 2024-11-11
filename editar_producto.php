<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $producto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $total = $_POST["total"];

    // Actualizar registro
    $sql = "UPDATE productos SET producto='$producto', cantidad=$cantidad, precio=$precio, total=$total WHERE id_producto=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
        echo "<br><a href='index.php'>Ingresar nuevo producto</a>";
        echo "<br><a href='visualizar_productos.php'>Ver productos existentes</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    header("Location: visualizar_productos.php");
    exit();
} else {
    $id = $_GET["id"];
    $sql = "SELECT * FROM productos WHERE id_producto=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <p id="InstanceNumberText">Instancia No. #1</p>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script>
        function calcularTotal() {
            let cantidad = document.getElementById("cantidad").value;
            let precio = document.getElementById("precio").value;
            let total = cantidad * precio;
            document.getElementById("total").value = total.toFixed(2);
        }
    </script>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="editar_producto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" value="<?php echo $row['producto']; ?>" required><br><br>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo $row['cantidad']; ?>" min="1" oninput="calcularTotal()" required><br><br>
        
        <label for="precio">Precio por unidad:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $row['precio']; ?>" step="0.01" oninput="calcularTotal()" required><br><br>
        
        <label for="total">Total:</label>
        <input type="text" id="total" name="total" value="<?php echo $row['total']; ?>" readonly><br><br>
        
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
