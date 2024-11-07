-- Banco de dados: `associacao_dev`

-- Tabela `associados`

CREATE TABLE `associados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `cpf` varchar(14) NOT NULL UNIQUE,
  `data_filiacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela `anuidades`

CREATE TABLE `anuidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` year(4) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pago` tinyint(1) NOT NULL DEFAULT 0,
  `associado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`associado_id`) REFERENCES `associados`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
