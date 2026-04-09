<?php
// O caminho exato da gaveta que agora está destrancada para sempre
$caminho_banco = '/app/dados/usuarios.sqlite'; 

try {
    $db = new PDO('sqlite:' . $caminho_banco);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela de clientes se ela ainda não existir
    $db->exec("CREATE TABLE IF NOT EXISTS clientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE,
        senha TEXT
    )");
} catch (PDOException $e) {
    die(json_encode(['sucesso' => false, 'erro' => 'Erro interno: ' . $e->getMessage()]));
}
?>
