<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<?php
    require_once '../models/MateriaModel.php';

    session_start();

    $MateriaModel = new MateriaModel();

    $Materias = $MateriaModel->buscarMaterias();
?>
<body>
    <header>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html'; // Verifique o nome correto do arquivo
            } 
            else {
                require_once '../public/html/menuCliente.html'; // Verifique o nome correto do arquivo
            }
        ?>
        <h1>Principal</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Materias as $Materia) : ?>
                    <tr>
                        <td><?= $Materia->descricao; ?></td>
                        
                        <td>
                            <a href="Materia.php?idMateria=<?= $Materia->idmateria; ?>">Abrir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
