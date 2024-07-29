<?php
require_once '../controllers/UsuarioController.php';

$UsuarioController = new UsuarioController();

$rota = $_POST['rota'];

switch($rota){
    case "entrar":
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $UsuarioController->validarUsuario($email,$senha);
        break;
    case "cadastrar":
        $nome = $_POST ['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $UsuarioController->CadastrarUsuario($nome,$email,$senha);

        break;    
    case "excluir":
        $idUsuario = intval($_POST['id_usuario']);
        $UsuarioController->excluirUsuario($idUsuario);
        break;
}
