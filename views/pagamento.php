<?php
session_start();
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cobranca_id = $_POST['cobranca_id'];

    $sql = "UPDATE cobrancas SET pago = 1 WHERE id = :cobranca_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cobranca_id' => $cobranca_id]);

    $_SESSION['mensagem'] = "Pagamento registrado com sucesso!";
}

$cobrancas = $pdo->query("SELECT cobrancas.id, associados.nome, anuidades.ano, anuidades.valor, cobrancas.pago 
                          FROM cobrancas 
                          JOIN associados ON cobrancas.associado_id = associados.id 
                          JOIN anuidades ON cobrancas.anuidade_id = anuidades.id
                          WHERE cobrancas.pago = 0")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAA - Registro de Pagamentos</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/views/styles.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
</head>

<body>
    <main class="main">
        <h1 class="title">SGAA - Registro de Pagamentos</h1>
        <?php
        if (isset($_SESSION['mensagem'])) {
            echo "<p>{$_SESSION['mensagem']}</p>";
            unset($_SESSION['mensagem']);
        }
        ?>
        <form method="POST">
            <label for="cobranca_id">Cobrança:</label>
            <select name="cobranca_id" id="cobranca_id" required>
                <?php foreach ($cobrancas as $cobranca): ?>
                    <option value="<?= $cobranca['id'] ?>">
                        <?= $cobranca['nome'] ?> - <?= $cobranca['ano'] ?> - R$<?= number_format($cobranca['valor'], 2, ',', '.') ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <button type="submit">Registrar Pagamento</button>
        </form>

        <a href="../index.php">Voltar para a página principal</a>
    </main>
</body>

</html>