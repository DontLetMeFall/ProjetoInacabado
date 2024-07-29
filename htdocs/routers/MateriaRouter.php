<?php
    require_once '../controllers/MateriaController.php';

    $MateriaController = new MateriaController();

    $rota =$_POST['rota'];

    switch($rota){
        case "Cadastrar":
                $idMateria = $_POST['idMateria'];
                $descricao = $_POST['descricao'];
    
                $MateriaController->cadastrarMateria($descricao);
    
                break;
            case "excluir":
                $idMateria = intval($_POST['id_materia']);
    
                $MateriaController->excluirMateria($idMateria);
    
                break;
            case "salvar":
                $idMateria = $_POST['idMateria'];
                $descricao = $_POST['descricao'];
              
    
                $MateriaController->atualizarMateria($idMateria, $descricao);
    
                break;
    }





?>