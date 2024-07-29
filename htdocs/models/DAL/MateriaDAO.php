<?php

    require_once 'conexao.php';

    class MateriaDAO   {
        public function cadastrarMateria(MateriaModel $Materia){
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO materia VALUES(null,:descricao);";
        
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':descricao', $Materia->descricao);
            return $stmt->execute();

    

        }

        public function buscarMateriaPorId(){

            $conexao = (new conexao())->getConexao();
            $sql = "SELECT * FROM materia WHERE id_materia = :id_materia;";

        
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_materia', 2);
            $stmt->bindParam(':Usuario', $Usuario);
            $stmt->bindParam(':descricao', $descricao);
        
            $retorno = $stmt->execute();
        
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function buscarMaterias(){

            $conexao = (new conexao())->getConexao();
        
            $sql = "SELECT * FROM materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        }

        public function excluirMateria(int $idMateria){
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM materia WHERE id_materia = :id_materia";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_materia', $idMateria);
            return $stmt->execute();
        }


        public function atualizarMateria($Materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE materia SET  descricao = :descricao WHERE id_materia = :id_materia";

            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':descricao', $Materia->descricao);
            $stmt->bindValue(':id_materia', $Materia->id_materia);
    
            return $stmt->execute();
        }
    



    }


?>
       