<?php
    require_once 'DAL/MateriaDAO.php';

    class MateriaModel {
        public ?int $idMateria;
        public ?string $descricao;

        public function __construct(?int $idMateria = null, ?string $descricao = null) {
            $this->idMateria = $idMateria;
            $this->descricao = $descricao;
        }
        public function cadastrarMateria(MateriaModel $Materia) {
            $MateriaDAO = new MateriaDAO();

            return $MateriaDAO->cadastrarMateria($Materia);
        }

        public function buscarMaterias() {
            $MateriaDAO = new MateriaDAO();


            $Materias = $MateriaDAO->buscarMaterias();
        
            foreach ($Materias as $chave => $Materia) {
                $Materias[$chave] = new MateriaModel(
                    $Materia['id_materia'],
                    $Materia['descricao'],

                );
            }

            return $Materias;
        }

        public function buscarMateriaPorId(int $idMateria) {
            $MateriaDAO = new MateriaDAO();
            $UsuarioModel = new UsuarioModel();

            $Materia = $MateriaDAO->buscarMateriaPorId($idMateria);

            $Materia = new MateriaModel(
                $Materia['id_materia'],
               
                $Materia['descricao'],
               
            );

            return $Materia;
        }

        public function excluirMateria(int $idMateria) {
            $MateriaDAO = new MateriaDAO();

            return $MateriaDAO->excluirMateria($idMateria);
        }

        public function atualizarMateria(MateriaModel $Materia) {
            $MateriaDAO = new MateriaDAO();

            return $MateriaDAO->atualizarMateria($Materia);
        }


        
    }
 
?>