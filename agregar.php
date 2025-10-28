<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $destinatario = $_POST['destinatario'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];

    $stmt = $pdo->prepare("INSERT INTO envios (destinatario, direccion, descripcion) VALUES (?, ?, ?)");
    $stmt->execute([$destinatario, $direccion, $descripcion]);

    header("Location: index.php");
    exit;
}
?>
