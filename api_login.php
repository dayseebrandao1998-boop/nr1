<?php
session_start();

// Recebe os dados do front-end
$emailDigitado = $_POST['user'] ?? '';
$senhaDigitada = $_POST['pass'] ?? '';

// ==========================================
// 👑 ACESSO SUPREMO (MASTER LOGIN) 👑
// ==========================================
if ($emailDigitado === 'perone@admin.com' && $senhaDigitada === 'Suprema123') {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = 'Admin Supremo';
    echo json_encode(['sucesso' => true, 'master' => true]);
    exit; // Libera o acesso supremo ANTES de tocar no banco!
}

// Se não for admin, aí sim chama o banco para validar os clientes
require 'banco.php';

// Procura o email do cliente no banco de dados SQLite
$stmt = $db->prepare("SELECT * FROM clientes WHERE email = :email");
$stmt->execute([':email' => $emailDigitado]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o email existir e a senha bater com a criptografia
if ($usuario && password_verify($senhaDigitada, $usuario['senha'])) {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $usuario['email'];
    echo json_encode(['sucesso' => true]);
} else {
    echo json_encode(['sucesso' => false, 'erro' => 'E-mail ou senha incorretos!']);
}
?>