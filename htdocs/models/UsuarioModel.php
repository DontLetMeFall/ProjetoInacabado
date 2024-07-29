<?php
require_once 'DAL/UsuarioDAO.php';

class UsuarioModel {
    

    public ?int $idUsuario;
    public ?int $idTipoUsuario;
    public ?string $nome;
    public ?string $email;
    public ?string $senha;

    public function __construct(?int $idUsuario = null, ?int $idTipoUsuario = null, ?string $nome = null, ?string $email = null, ?string $senha = null) {
        $this->idUsuario = $idUsuario;
        $this->idTipoUsuario = $idTipoUsuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }
    
    public function buscarUsuarioPorEmailESenha(string $email, string $senha) {
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->buscarUsuarioPorEmailESenha($email, $senha);
    
        return $retorno;
    }

    public function inserirUsuario(string $nome, string $email, string $senha) {
        $usuarioDAO = new UsuarioDAO();
        $retorno = $usuarioDAO->inserirUsuario($nome, $email, $senha);

        return $retorno;
    }


    public function buscarUsuarioPorId(int $idUsuario) {
        $UsuarioDAO = new UsuarioDAO();
    
        $Usuario = $UsuarioDAO->buscarUsuarioPorId($idUsuario);
    
        $Usuario = new UsuarioModel($Usuario['id_usuario'], $Usuario['nome']);
    
        return $Usuario;
    }
    
        public function buscarUsuarios() {

        $UsuarioDAO = new UsuarioDAO();

        $Usuarios = $UsuarioDAO->buscarUsuarios();
    
        foreach ($Usuarios as $chave => $Usuario) {
            $Usuarios[$chave] = new UsuarioModel(
                $Usuario['id_usuario'],
                $Usuario['id_tipo_usuario'],
                $Usuario['nome'],
                $Usuario['email'],
             
            );
        }
    
        return $Usuarios;
    }
    public function excluirUsuario(int $idUsuario)
    {
        $UsuarioDAO = new UsuarioDAO();
        return $UsuarioDAO->excluirUsuario($idUsuario);
    }
 }
?>
    


  