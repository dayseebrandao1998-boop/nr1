<?php
// Aponte para a pasta persistente que você configurou no volume do Coolify
$caminho_banco = __DIR__ . '/dados/usuarios.sqlite'; 

try {
    // Cria ou conecta ao arquivo do banco de dados
    $db = new PDO('sqlite:' . $caminho_banco);
    
    // Ativa os erros do banco para não ficarem escondidos
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela de clientes se ela ainda não existir
    $db->exec("CREATE TABLE IF NOT EXISTS clientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE,
        senha TEXT
    )");
} catch (PDOException $e) {
    // Se der erro de permissão, o PHP vai registrar o motivo exato
    die(json_encode(['sucesso' => false, 'erro' => 'Erro interno no servidor de banco de dados: ' . $e->getMessage()]));
}
?>
