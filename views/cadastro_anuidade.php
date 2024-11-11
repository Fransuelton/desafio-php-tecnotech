<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAA - Cadastro de Anuidades</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/views/styles.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
</head>

<body>
    <main class="main">
        <h1 class="title">SGAA - Cadastro de Anuidades</h1>

        <?php
        session_start();
        if (isset($_SESSION['mensagem'])) {
            echo "<p>{$_SESSION['mensagem']}</p>";
            unset($_SESSION['mensagem']);
        }
        ?>

        <div class="form-container">
            <form action="../controllers/AnuidadeController.php" method="post">
                <label for="ano">Ano:</label>
                <input type="number" name="ano">

                <label for="valor">Valor:</label>
                <input type="number" name="valor">

                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <a href="../index.php" class="link">Voltar para a página principal</a>
    </main>
</body>

</html>