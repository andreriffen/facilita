<?php
// Credenciais do banco de dados
$host = 'localhost';
$dbname = 'u459310553_facilita_leads';
$username = 'u459310553_facilita_user';
$password = 'Facilita2025@!';

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibe mensagem de erro e encerra o script
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
