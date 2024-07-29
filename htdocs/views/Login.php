<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="../routers/UsuarioRouter.php" method="post" onsubmit="return validarCamposLogin(event);">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="senha">Senha</label><br>
            <input type="password" id="senha" name="senha" required><br><br>
            <input type="hidden" id="rota" name="rota" value="entrar">
            <input type="submit" value="Entrar">
        </form>
        
        
    </main>
</body>
</html>
