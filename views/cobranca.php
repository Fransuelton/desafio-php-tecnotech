<?php

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

    echo "Cobrança registrada com sucesso!";
}
?>

<form method="POST">
    Associado: 
    <select name="associado_id" required>
        <?php foreach ($associados as $associado): ?>
            <option value="<?= $associado['id'] ?>"><?= $associado['nome'] ?> (<?= $associado['email'] ?>)</option>
        <?php endforeach; ?>
    </select><br>

    Anuidade: 
    <select name="anuidade_id" required>
        <?php foreach ($anuidades as $anuidade): ?>
            <option value="<?= $anuidade['id'] ?>"><?= $anuidade['ano'] ?> - R$<?= number_format($anuidade['valor'], 2, ',', '.') ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Registrar Cobrança</button>
</form>
