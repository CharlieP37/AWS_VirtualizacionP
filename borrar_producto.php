<?php
include 'config.php';

$id = $_GET['id'];

// Borrar registro
$sql = "DELETE FROM productos WHERE id_producto=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro borrado correctamente";
    echo "<br><a href='index.php'>Ingresar nuevo producto</a>";
    echo "<br><a href='visualizar_productos.php'>Ver productos existentes</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

header("Location: visualizar_productos.php");
exit();
?>
