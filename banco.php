<?php
// Tiramos a pasta 'dados'. Vamos tentar criar o arquivo solto na pasta principal.
$caminho_banco = __DIR__ . '/usuarios.sqlite'; 

try {
    // Tenta conectar/criar o arquivo diretamente
    $db = new PDO('sqlite:' . $caminho_banco);
    
    // Ativa os alertas de erro
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela
    $db->exec("CREATE TABLE IF NOT EXISTS clientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE,
        senha TEXT
    )");
} catch (PDOException $e) {
    die(json_encode(['sucesso' => false, 'erro' => 'Erro interno no servidor de banco de dados: ' . $e->getMessage()]));
}
?>
