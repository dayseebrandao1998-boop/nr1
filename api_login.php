<?php
session_start();
require 'banco.php';

// Recebe os dados do front-end
$emailDigitado = $_POST['user'] ?? '';
$senhaDigitada = $_POST['pass'] ?? '';

// ==========================================
// 👑 ACESSO SUPREMO (MASTER LOGIN) 👑
// Troque pelo e-mail e senha que você quiser!
// ==========================================
if ($emailDigitado === 'perone@admin.com' && $senhaDigitada === 'Suprema123') {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = 'Admin Supremo';
    echo json_encode(['sucesso' => true, 'master' => true]);
    exit; // Para a execução do PHP aqui e já libera o acesso!
}

// Se não for o acesso supremo, procura o email do cliente no banco de dados SQLite
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