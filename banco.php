<?php
// Cria ou conecta ao arquivo do banco de dados na mesma pasta
$db = new PDO('sqlite:usuarios.sqlite');

// Cria a tabela de clientes se ela ainda não existir
$db->exec("CREATE TABLE IF NOT EXISTS clientes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT UNIQUE,
    senha TEXT
)");
?>