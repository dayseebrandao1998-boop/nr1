<?php
// Define o caminho da pasta e do arquivo
$pasta_dados = __DIR__ . '/dados';
$caminho_banco = $pasta_dados . '/usuarios.sqlite'; 

try {
    // 1. A MÁGICA: Verifica se a pasta 'dados' existe. Se não existir, ele cria com permissão total (0777).
    if (!is_dir($pasta_dados)) {
        mkdir($pasta_dados, 0777, true);
    }

    // 2. Cria ou conecta ao arquivo do banco de dados
    $db = new PDO('sqlite:' . $caminho_banco);
    
    // 3. Ativa os erros do banco para não ficarem escondidos
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 4. Cria a tabela de clientes se ela ainda não existir
    $db->exec("CREATE TABLE IF NOT EXISTS clientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE,
        senha TEXT
    )");
} catch (PDOException $e) {
    // Se der erro, o PHP vai registrar o motivo exato
    die(json_encode(['sucesso' => false, 'erro' => 'Erro interno no servidor de banco de dados: ' . $e->getMessage()]));
}
?>
