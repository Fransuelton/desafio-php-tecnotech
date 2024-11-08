<?php
session_start();
require_once '../config.php';
require_once '../models/Associado.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_filiacao = $_POST['data_filiacao'];

    filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!empty($nome) && !empty($email) && !empty($cpf) && !empty($data_filiacao)) {
        $associado = new Associado($pdo);
        $associado->cadastrar($nome, $email, $cpf, $data_filiacao);

        $_SESSION['mensagem'] = "Associado cadastrado com sucesso!";
        
    } else {
        $_SESSION['mensagem'] = "Nome, e-mail, CPF e data de filiação são obrigatórios!";
        
    }

    header("Location: ../views/cadastro_associado.php");
    exit;
}


