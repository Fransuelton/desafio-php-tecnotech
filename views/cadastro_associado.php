<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAA - Cadastro de Associados</title>
</head>

<body>
    <main>
        <h1>SGAA - Cadastro de Associados</h1>

        <?php
        session_start();
        if (isset($_SESSION['mensagem'])) {
            echo "<p>{$_SESSION['mensagem']}</p>";
            unset($_SESSION['mensagem']);
        }
        ?>

        <fieldset>
            <legend>Cadastro de Associados</legend>
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
        </fieldset>
    </main>

    <script>

    </script>
</body>

</html>