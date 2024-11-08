<?php

require_once '../config.php';

class Anuidade
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrar($ano, $valor)
    {
        try {
            $sql = "INSERT INTO anuidades (ano, valor) VALUES (:ano, :valor)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':ano', $ano);
            $stmt->bindParam(':valor', $valor);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar anuidade: " . $e->getMessage();
        }
    }
}
