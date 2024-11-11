<?php

require '../config.php';

$sql = "SELECT associados.nome, associados.email, anuidades.ano, anuidades.valor, cobrancas.data_pagamento
        FROM associados
        JOIN cobrancas ON cobrancas.associado_id = associados.id
        JOIN anuidades ON cobrancas.anuidade_id = anuidades.id
        WHERE cobrancas.data_pagamento IS NULL AND associados.data_filiacao <= CURDATE()";
$atrasos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Associados com Anuidade em Atraso:</h3>";
foreach ($atrasos as $atraso) {
    echo "{$atraso['nome']} - {$atraso['ano']} - R$" . number_format($atraso['valor'], 2, ',', '.') . "<br>";
}
?>
