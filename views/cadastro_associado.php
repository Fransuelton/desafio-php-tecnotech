<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAA - Cadastro de Associados</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/views/styles.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
</head>

<body>
    <main class="main">
        <h1 class="title">SGAA - Cadastro de Associados</h1>

        <?php
        session_start();
        if (isset($_SESSION['mensagem'])) {
            echo "<p>{$_SESSION['mensagem']}</p>";
            unset($_SESSION['mensagem']);
        }
        ?>

        <div>
            <form action="../controllers/AssociadoController.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" required>

                <label for="cpf">CPF:</label>
                <input type="number" name="cpf" required>

                <label for="data_filiacao">Data de filiação:</label>
                <input type="date" name="data_filiacao" required>

                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <a href="../index.php" class="link">Voltar para a página principal</a>
    </main>
</body>

</html>