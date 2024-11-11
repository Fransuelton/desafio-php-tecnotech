<?php

session_start();
require_once '../config.php';
require_once '../models/Anuidade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];

    if (!empty($ano) && !empty($valor)) {
        $anuidade = new Anuidade($pdo);
        $anuidade->cadastrar($ano, $valor);

        $_SESSION['mensagem'] = "Anuidade cadastrada com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Ano e valor são obrigatórios!";
    }

    header("Location: ../views/cadastro_anuidade.php");
    exit;
}
