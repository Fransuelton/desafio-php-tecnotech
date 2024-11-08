<?php

require_once '../config.php';

class Associado
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $email, $cpf, $data_filiacao)
    {

        try {
            $sql = "INSERT INTO associados (nome, email, cpf, data_filiacao) VALUES (:nome, :email, :cpf, :data_filiacao)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_filiacao', $data_filiacao);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar associado: " . $e->getMessage();
        }
    }
}
