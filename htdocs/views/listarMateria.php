<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Materia</title>
</head>
<?php
    require_once '../models/MateriaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $MateriaModel = new MateriaModel();

    $Materias = $MateriaModel->buscarMaterias();
   
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html' ?>
        <h1>Listar Materias</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>descricao</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Materias as $Materia) :?>
                    <tr>
                        <td><?= $Materia->descricao; ?></td>
                        <td>
                            <a href="editarMateria.php?idmateria=<?= $Materia->idMateria; ?>">Editar</a>
                            <form action="../routers/MateriaRouter.php" method="post">
                                <input type="hidden" name="id_materia" id="id_materia" value="<?= $Materia->idMateria; ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>