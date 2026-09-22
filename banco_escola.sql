-- Banco de dados usado pelo projeto (conexao.php aponta para "escola")
CREATE DATABASE IF NOT EXISTS escola CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE escola;

CREATE TABLE IF NOT EXISTS alunos (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    ra       VARCHAR(20)  NOT NULL,
    nome     VARCHAR(100) NOT NULL,
    turma    VARCHAR(50)  NOT NULL,
    sala     VARCHAR(50)  NOT NULL,
    periodo  VARCHAR(50)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
