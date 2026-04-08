<?php
echo "<div style='font-family: sans-serif; padding: 20px; line-height: 1.6;'>";
echo "<h2>🔍 Raio-X do Servidor Coolify</h2>";

// 1. Descobre o caminho real onde o site está rodando
echo "<b>1. Pasta principal do site (__DIR__):</b> " . __DIR__ . "<br><br>";

// 2. Testa a gaveta /app/dados (aquela que configuramos no painel)
$pasta_app = '/app/dados';
echo "<b>2. A gaveta configurada ($pasta_app) existe?</b> " . (is_dir($pasta_app) ? '🟢 SIM' : '🔴 NÃO') . "<br>";
if (is_dir($pasta_app)) {
    echo "<b>3. O PHP tem permissão para gravar nela?</b> " . (is_writable($pasta_app) ? '🟢 SIM' : '🔴 NÃO (Bloqueado pelo Docker)') . "<br>";
}

// 3. Testa uma gaveta local
$pasta_local = __DIR__ . '/dados';
echo "<br><b>4. E a gaveta local ($pasta_local) existe?</b> " . (is_dir($pasta_local) ? '🟢 SIM' : '🔴 NÃO') . "<br>";
if (is_dir($pasta_local)) {
    echo "<b>5. O PHP tem permissão para gravar na gaveta local?</b> " . (is_writable($pasta_local) ? '🟢 SIM' : '🔴 NÃO') . "<br>";
}

echo "<br><b>Usuário atual do sistema rodando o PHP:</b> " . get_current_user();
echo "</div>";
die();
?>
