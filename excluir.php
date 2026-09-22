<?php
    include "conexao.php";

    // O botão do relatório usa a url excluir.php?<id> (sem nome de parâmetro),
    // então o id chega em QUERY_STRING em vez de em $_GET.
    $id = (int) $_SERVER['QUERY_STRING'];

    if ($id > 0) {
        try {
            $stmt = $conn->prepare("DELETE FROM alunos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $erro) {
            die("Erro ao excluir o aluno: " . $erro->getMessage());
        }
    }

    header("Location: relatorio.php");
    exit;
