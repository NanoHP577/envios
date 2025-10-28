<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM envios WHERE id = ?");
    $stmt->execute([$id]);
    $envio = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $destinatario = $_POST['destinatario'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];

    $stmt = $pdo->prepare("UPDATE envios SET destinatario=?, direccion=?, descripcion=? WHERE id=?");
    $stmt->execute([$destinatario, $direccion, $descripcion, $id]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Envío</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Editar Envío</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $envio['id'] ?>">
        <input type="text" name="destinatario" value="<?= htmlspecialchars($envio['destinatario']) ?>" required>
        <input type="text" name="direccion" value="<?= htmlspecialchars($envio['direccion']) ?>" required>
        <textarea name="descripcion" required><?= htmlspecialchars($envio['descripcion']) ?></textarea>
        <button type="submit">Guardar Cambios</button>
        <a href="index.php" class="btn-cancelar">Cancelar</a>
    </form>
</div>
</body>
</html>
