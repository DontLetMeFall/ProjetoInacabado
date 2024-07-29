<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<?php

require_once '../models/UsuarioModel.php';

session_start();

if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
    header('Location: Login.php');
    exit();
}

$idTipoUsuario = $_GET['id_tipo_usuario'];

$idTipoUsuario =   new  tipoUsuarioModel();

$tipoUsuario  =  $tipoUsuarioModel-> buscarTipoUsuarioPorId($idTipoUsuario);
?>
<body>
    <header>
        <?php require_once '../pulic/html/menuAdmin.html'; ?>
        <h1>Editar Usuario</h1>
    </header>
    <main>
        <form action="../routers/UsuarioRouter.php " method="post"></form>
        <label for="descricao">Descricao</label>
        <br>
        <input type="text" name="descricao" value="descricao"  id="<?=$tipoUsuario->descricaoTipoUsuario ; ?>">
        <br>
        <br>
        <input type="hidden"  name="idTipoUsuario" value="idTipoUsuario" id="<?=$tipoUsuario->$idTipoUsuario; ?>">
        <input type="hidden" name="rota" id="rota" value="salvar">
        <input type="submit" value="Salvar">
    </main>
</body>
</html>