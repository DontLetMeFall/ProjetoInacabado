<?php
require_once 'conexao.php';

class UsuarioDAO{
    public function  buscarUsuarioPorEmailESenha(string $email,string $senha) {
        $conexao  = (new conexao())->getConexao();

        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha;";

        $stmt = $conexao->prepare($sql);
        $stmt ->bindParam(':email',$email);
        $stmt ->bindParam(':senha',$senha);
        $stmt ->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
        
    }

    public function inserirUsuario(string $nome,string $email,string $senha) {
        $conexao = (new conexao())->getConexao();

        $sql = "INSERT INTO usuario VALUES(null,:idTipoUsuario,:nome,:email,:senha);";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idTipoUsuario', 2);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $retorno = $stmt->execute();

       return $retorno;

    }

    public function  buscarUsuarioPorId(int $idUsuario){
        $conexao = (new conexao())->getConexao();

        $sql = "SELECT * FROM usuario where idUsuario = :id_usuario";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id_usuario', $idUsuario);
        $retorno = $stmt->execute();

       return $retorno;

    }

    public function buscarUsuarios(){
        $conexao = (new conexao())->getConexao();

        $sql = "SELECT * FROM usuario;";
        
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   
   public function excluirUsuario(int $idUsuario)
   {
        $conexao = (new conexao())->getConexao();
        
        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id_usuario', $idUsuario);
        return $stmt->execute();
   }
}

?>
