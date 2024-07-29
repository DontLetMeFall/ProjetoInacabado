<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Materia</title>
</head>
<?php
    require_once '../models/MateriaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: Login.php');
        exit();
    }

    $MateriaModel = new MateriaModel();

    $Materias = $MateriaModel->buscarMaterias();
?>
<body>
    <header>
    <?php require_once '../public/html/menuAdmin.html'; ?>

    <h1>Cadastrar Matérias</h1>
    
    </header>
    <main>
        <form action="../routers/MateriaRouter.php" method="post" onsubmit="return;">>
        <label for="descricao">descricao</label>
        <br>
        <input type="text" name="descricao" id="descricao" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="Cadastrar">
        <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>