<<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Matéria</title>
</head>
<body>
    <?php
        // Inclui o modelo de MateriaModel
        require_once '../models/MateriaModel.php';

        // Inicia a sessão
        session_start();

        // Verifica se o usuário está logado
        if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true) {
            header('Location: Login.php');
            exit();
        }

        // Cria uma instância de MateriaModel
        $MateriaModel = new MateriaModel();

        // Obtém o ID da matéria a ser editada
        $idMateria = intval($_GET['id_materia']);

        // Busca a matéria pelo ID
        $Materia = $MateriaModel->buscarMateriaPorId($idMateria);
    ?>
    <header>
        <?php
            // Inclui o menu adequado dependendo do tipo de usuário
            if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html';
            }

            else {
                require_once '../public/html/menuCliente.html';
            }
        ?>
        <h1>Editar Materia</h1>
    </header>
    <main>
        <h2><?= $materia->descricao; ?></h2>
        <p><?= $materia->Usuario->nome; ?></p>
        <?php if (!empty($Materia->$imagemMateria)) : ?>
            <img src="<?= $Materia->$imagemMateria; ?>">
        <?php endif; ?>
        <p><?= $Materia->descricao; ?></p>
    </main>
</body>
</html>
