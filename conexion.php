<?php
$host = "mysql-juandy.alwaysdata.net";
$dbname = "juandy_envios";
$user = "juandy";
$pass = "caT96AHSqF2mDBy";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
