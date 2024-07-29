<?php
    require_once '../models/MateriaModel.php';

    class MateriaController {
        public function cadastrarMateria(string $descricao){
            $MateriaModel = new MateriaModel();

            $Materia = new MateriaModel(null,$descricao);

            $retorno = $MateriaModel->CadastrarMateria($Materia);
            
            if($retorno){
            header('Location: ../views/Principal.php');
            }
            else{
            header('Location: ../views/CadastrarMateria.php');

             }
                exit();
            }
            public function excluirMateria(int $idMateria) {
            $MateriaModel = new MateriaModel();

            $MateriaModel->excluirMateria($idMateria);

            header('Location: ../views/listarMateria.php');
            exit();
            }

            public function atualizarMateria(int $idMateria, string $descricao) {
            $MateriaModel = new MateriaModel();

            $Materia = new MateriaModel($idMateria, $descricao,);

            $retorno = $MateriaModel->atualizarMateria($Materia);

            if ($retorno) {
                header('Location: ../views/listarMateria.php');
            }
            else {
                header("Location: ../views/editarMateria.php?idMateria= $idMateria");
            }
            exit();
        }
    }
?>