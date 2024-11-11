<?php

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cobranca_id = $_POST['cobranca_id'];

    $sql = "UPDATE cobrancas SET pago = 1 WHERE id = :cobranca_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cobranca_id' => $cobranca_id]);

    echo "Pagamento registrado com sucesso!";
}

$cobrancas = $pdo->query("SELECT cobrancas.id, associados.nome, anuidades.ano, anuidades.valor, cobrancas.pago 
                          FROM cobrancas 
                          JOIN associados ON cobrancas.associado_id = associados.id 
                          JOIN anuidades ON cobrancas.anuidade_id = anuidades.id
                          WHERE cobrancas.pago = 0")->fetchAll(PDO::FETCH_ASSOC);
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
