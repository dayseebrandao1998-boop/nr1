<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PSI-GRO</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body { display: flex; align-items: center; justify-content: center; height: 100vh; background-color: var(--bg-color); }
        .login-card { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; }
        .login-logo { font-size: 3rem; color: var(--btn-yellow); margin-bottom: 10px; }
        .login-title { color: var(--sidebar-bg); margin-bottom: 30px; font-weight: 700; }
        .form-group { text-align: left; margin-bottom: 20px; }
        .btn-login { width: 100%; margin-top: 10px; height: 45px; }
        
        /* Overlay de Carregamento */
        #loader-overlay { 
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(30, 41, 59, 0.95); z-index: 9999; flex-direction: column;
            align-items: center; justify-content: center; color: white;
        }
        .spinner { 
            width: 50px; height: 50px; border: 5px solid rgba(255,255,255,0.1); 
            border-top: 5px solid var(--btn-yellow); border-radius: 50%; animation: spin 1s linear infinite; 
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>

    <!-- Overlay de Carregamento -->
    <div id="loader-overlay">
        <div class="spinner"></div>
        <p style="margin-top: 20px; font-weight: bold; letter-spacing: 1px;">AUTENTICANDO...</p>
    </div>

    <!-- Áudio de Loading (URL de exemplo - você pode trocar pelo seu arquivo) -->
    <audio id="audioLoading" src="https://assets.mixkit.co/active_storage/sfx/2571/2571-preview.mp3"></audio>

    <div class="login-card">
        <i class="fa-solid fa-brain login-logo"></i>
        <h2 class="login-title">PSI-GRO</h2>
        
        <form onsubmit="realizarLogin(event)">
            <div class="form-group">
                <label>Usuário:</label>
                <input type="text" id="user" placeholder="Ex: gestor" required>
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" id="pass" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-primary btn-login">ENTRAR NO SISTEMA</button>
        </form>
        <p style="margin-top: 20px; font-size: 0.8rem; color: var(--text-light);">Acesso Restrito - Monitoramento GRO</p>
    </div>



    <script src="js-cerebro.js"></script>
    <script>
        async function realizarLogin(event) {
            event.preventDefault(); // Impede a página de recarregar
            
            const user = document.getElementById('user').value;
            const pass = document.getElementById('pass').value;
            const btn = document.querySelector('.btn-login');

            // Muda o texto do botão temporariamente pra dar feedback de carregamento
            const textoOriginal = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Conectando...';

            try {
                // 1. Prepara os dados para mandar pro PHP
                const formData = new FormData();
                formData.append('user', user);
                formData.append('pass', pass);

                // 2. Chama o PHP lá na sua VPS
                const resposta = await fetch('api_login.php', {
                    method: 'POST',
                    body: formData
                });

                // 3. Lê o que o PHP respondeu (o JSON de sucesso ou erro)
                const dados = await resposta.json();

                if (dados.sucesso) {
                    // DEU CERTO! O Banco de Dados aprovou.
                    const loader = document.getElementById('loader-overlay');
                    const som = document.getElementById('audioLoading');
                    
                    // Ativa o visual e o som
                    loader.style.display = 'flex';
                    som.play();

                    // Salva a sessão no navegador pro js-cerebro.js não te bloquear nas outras páginas
                    localStorage.setItem('psi_gro_sessao', 'ativo');
                    localStorage.setItem('psi_gro_email_logado', user); // Salva o email pra usar no dashboard depois

                    // Aguarda 3.5 segundos antes de entrar na página principal
                    setTimeout(() => {
                        window.location.href = "dashboard.html";
                    }, 3500);

                } else {
                    // DEU ERRO! (Senha ou email incorretos)
                    alert(dados.erro || "Usuário ou senha incorretos!");
                    btn.disabled = false;
                    btn.innerHTML = textoOriginal;
                }

            } catch (erro) {
                // Erro de servidor (ex: se o PHP estiver fora do ar)
                console.error("Erro de comunicação com o servidor:", erro);
                alert("Erro ao tentar conectar com o banco de dados.");
                btn.disabled = false;
                btn.innerHTML = textoOriginal;
            }
        }
    </script>
</body>
</html>