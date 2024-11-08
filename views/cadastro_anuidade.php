<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAA - Cadastro de Anuidades</title>
</head>

<body>
    <main>
        <h1>SGAA - Cadastro de Anuidades</h1>

        <?php
        session_start();
        if (isset($_SESSION['mensagem'])) {
            echo "<p>{$_SESSION['mensagem']}</p>";
            unset($_SESSION['mensagem']);
        }
        ?>

        <form action="../controllers/AnuidadeController.php" method="post">
            <label for="ano">Ano:</label>
            <input type="number" name="ano">

            <label for="valor">Valor:</label>
            <input type="number" name="valor">

            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>

</html>