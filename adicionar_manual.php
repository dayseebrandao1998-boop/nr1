<?php
require 'banco.php';

// Proteção simples usando a mesma senha suprema da sua API
$chave = $_GET['chave'] ?? '';
if ($chave !== 'Suprema123') {
    die('❌ Acesso negado. Você não tem permissão para estar aqui.');
}

$emailNovo = $_GET['email'] ?? '';

// Verifica se digitou um e-mail válido
if (!filter_var($emailNovo, FILTER_VALIDATE_EMAIL)) {
    die('⚠️ E-mail inválido. <br><br><b>Como usar:</b> acesse a URL colocando ?chave=Suprema123&email=cliente@email.com no final.');
}

// Cria a senha padrão '12345' criptografada (exatamente igual ao webhook)
$senhaPadrao = password_hash('12345', PASSWORD_DEFAULT);

try {
    // Insere no banco
    $stmt = $db->prepare("INSERT OR IGNORE INTO clientes (email, senha) VALUES (:email, :senha)");
    $stmt->execute([':email' => $emailNovo, ':senha' => $senhaPadrao]);
    
    // Verifica se realmente adicionou ou se a pessoa já existia
    if ($stmt->rowCount() > 0) {
        echo "✅ Sucesso! O usuário <b>{$emailNovo}</b> foi adicionado e já pode logar com a senha <b>12345</b>.";
    } else {
        echo "⚠️ O e-mail <b>{$emailNovo}</b> já existe no banco de dados.";
    }
} catch (Exception $e) {
    echo "❌ Erro ao adicionar no banco: " . $e->getMessage();
}
?>