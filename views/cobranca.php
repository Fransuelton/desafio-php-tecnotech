<?php
session_start();
require '../config.php';

$associados = $pdo->query("SELECT * FROM associados")->fetchAll(PDO::FETCH_ASSOC);
$anuidades = $pdo->query("SELECT * FROM anuidades")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $associado_id = $_POST['associado_id'];
    $anuidade_id = $_POST['anuidade_id'];

    $sql = "INSERT INTO cobrancas (associado_id, anuidade_id) VALUES (:associado_id, :anuidade_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'associado_id' => $associado_id,
        'anuidade_id' => $anuidade_id
    ]);

    $_SESSION['mensagem'] = "Cobrança registrada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAA - Registrar Cobranças</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/views/styles.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
</head>

<body>
    <main class="main">
        <h1 class="title">SGAA - Registrar Cobranças</h1>
        <?php
        if (isset($_SESSION['mensagem'])) {
            echo "<p>{$_SESSION['mensagem']}</p>";
            unset($_SESSION['mensagem']);
        }
        ?>
        <form method="POST">
            <label for="associado_id">Associado:</label>
            <select name="associado_id" id="associado_id" required>
                <?php foreach ($associados as $associado): ?>
                    <option value="<?= $associado['id'] ?>"><?= $associado['nome'] ?> (<?= $associado['email'] ?>)</option>
                <?php endforeach; ?>
            </select><br>

            <label for="anuidade_id">Anuidade:</label>
            <select name="anuidade_id" id="anuidade_id" required>
                <?php foreach ($anuidades as $anuidade): ?>
                    <option value="<?= $anuidade['id'] ?>"><?= $anuidade['ano'] ?> - R$<?= number_format($anuidade['valor'], 2, ',', '.') ?></option>
                <?php endforeach; ?>
            </select><br>

            <button type="submit">Registrar Cobrança</button>
        </form>

        <a href="../index.php">Voltar para a página principal</a>
    </main>
</body>

</html>