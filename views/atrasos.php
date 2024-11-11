<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAA- Associados com Anuidade em Atraso</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/views/atrasos.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
</head>

<body>
    <main class="container">
        <h1> SGAA - Associados com Anuidade em Atraso</h1>

        <?php
        require '../config.php';

        $sql = "SELECT associados.nome, associados.email, anuidades.ano, anuidades.valor
                FROM associados
                JOIN cobrancas ON cobrancas.associado_id = associados.id
                JOIN anuidades ON cobrancas.anuidade_id = anuidades.id
                WHERE cobrancas.pago = 0 AND associados.data_filiacao <= CURDATE()";
        $atrasos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if (count($atrasos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ano</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($atrasos as $atraso): ?>
                        <tr>
                            <td><?= htmlspecialchars($atraso['nome']) ?></td>
                            <td><?= htmlspecialchars($atraso['email']) ?></td>
                            <td><?= htmlspecialchars($atraso['ano']) ?></td>
                            <td>R$<?= number_format($atraso['valor'], 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum associado com anuidade em atraso.</p>
        <?php endif; ?>
        <a href="../index.php">Voltar para a página principal</a>
    </main>
</body>

</html>