<?php
// Usando o caminho EXATO que está configurado no seu painel do Coolify
$caminho_banco = '/app/dados/usuarios.sqlite'; 

try {
    // Conecta ou cria o arquivo do banco de dados direto na gaveta permitida
    $db = new PDO('sqlite:' . $caminho_banco);
    
    // Ativa os alertas de erro
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela de clientes
    $db->exec("CREATE TABLE IF NOT EXISTS clientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE,
        senha TEXT
    )");
} catch (PDOException $e) {
    die(json_encode(['sucesso' => false, 'erro' => 'Erro interno no banco de dados: ' . $e->getMessage()]));
}
?>
