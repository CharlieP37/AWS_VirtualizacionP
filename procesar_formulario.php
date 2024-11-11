<?php
include 'config.php';

// Obtener datos del formulario
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$total = $_POST['total'];

// Insertar datos en la base de datos
$sql = "INSERT INTO productos (producto, cantidad, precio, total) VALUES ('$producto', $cantidad, $precio, $total)";

if ($conn->query($sql) === TRUE) {
    echo "<p id=\"InstanceNumberText\">Instancia No. #1</p>";
    echo "Registro ingresado correctamente";
    echo "<br><a href='index.php'>Ingresar nuevo producto</a>";
    echo "<br><a href='visualizar_productos.php'>Ver productos existentes</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
