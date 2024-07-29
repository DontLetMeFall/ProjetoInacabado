<?php

require_once '../models/UsuarioModel.php';

class  UsuarioController{
    public function validarUsuario(string $email,string $senha){
        $email = str_replace(' ','',$email);
        $senha =md5(str_replace(' ','',$senha));

        $UsuarioModel = new UsuarioModel();
        $usuario = new UsuarioModel(null,null,null,$email,$senha);
        $retorno = $UsuarioModel->buscarUsuarioPorEmailESenha($email,$senha);

        session_start();

        if ($retorno) {
            $_SESSION['esta_logado'] = true;
            $_SESSION['id_tipo_usuario'] = $retorno['id_tipo_usuario'];

            if ($retorno['id_tipo_Usuario'] === 1) {
                header('Location: ../views/CadastrarUsuario.php');
            }
            else {
                header('Location: ../views/Principal.php');
            }
        }
        else {
            header('Location: ../views/Login.php');
        }
        
        exit();
    }
    public function cadastrarUsuario(string $nome, string $email, string $senha) {
        $email = str_replace(' ', '', $email);
        $senha = md5(str_replace(' ', '', $senha));

        $UsuarioModel = new UsuarioModel();
        $retorno = $UsuarioModel->inserirUsuario($nome, $email, $senha);

        if ($retorno === true) {
            header('Location: ../views/Principal.php');
        }
        else {
            header('Location: ../views/CadastrarUsuario.php');
        }

        #exit();
    }
    public function excluirUsuario(int $idUsuario)
    {
     $UsuarioModel = new UsuarioModel();

     $UsuarioModel->excluirUsuario($idUsuario);

     header('Location: ../views/listarUsuario.php');
     exit();

    }
}
?>