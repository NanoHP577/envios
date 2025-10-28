<?php
require 'conexion.php';
$envios = $pdo->query("SELECT * FROM envios ORDER BY fecha DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Envíos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>📦 Sistema de Gestión de Envíos</h1></header>

    <div class="container">
        <h2>Registrar nuevo envío</h2>
        <form action="agregar.php" method="POST">
            <input type="text" name="destinatario" placeholder="Destinatario" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <textarea name="descripcion" placeholder="Descripción del envío" required></textarea>
            <button type="submit">Agregar Envío</button>
        </form>

        <h2>Lista de Envíos</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Destinatario</th>
                <th>Dirección</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($envios as $e): ?>
            <tr>
                <td><?= $e['id'] ?></td>
                <td><?= htmlspecialchars($e['destinatario']) ?></td>
                <td><?= htmlspecialchars($e['direccion']) ?></td>
                <td><?= htmlspecialchars($e['descripcion']) ?></td>
                <td><?= $e['fecha'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $e['id'] ?>">✏️ Editar</a>
                    <a href="eliminar.php?id=<?= $e['id'] ?>" onclick="return confirm('¿Eliminar este envío?')">🗑️ Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
