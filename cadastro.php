<?php
    include "conexao.php";

    $mensagem = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $ra      = trim($_POST['ra']      ?? '');
        $nome    = trim($_POST['nome']    ?? '');
        $turma   = trim($_POST['turma']   ?? '');
        $sala    = trim($_POST['sala']    ?? '');
        $periodo = trim($_POST['periodo'] ?? '');

        if ($ra !== "" && $nome !== "" && $turma !== "" && $sala !== "" && $periodo !== "") {

            try {
                $sql = "INSERT INTO alunos (ra, nome, turma, sala, periodo)
                        VALUES (:ra, :nome, :turma, :sala, :periodo)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':ra', $ra);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':turma', $turma);
                $stmt->bindParam(':sala', $sala);
                $stmt->bindParam(':periodo', $periodo);
                $stmt->execute();

                header("Location: relatorio.php");
                exit;

            } catch (PDOException $erro) {
                $mensagem = "Erro ao salvar no banco: " . $erro->getMessage();
            }

        } else {
            $mensagem = "Preencha todos os campos.";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

    <?php include "menu.php"; ?>

    <main>
        <div class="cartao-vidro cartao-estreito">
            <h2>Cadastro de Aluno</h2>

            <?php if ($mensagem): ?>
                <div class="alerta-erro"><?= htmlspecialchars($mensagem) ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="campo">
                    <label for="ra">RA</label>
                    <input type="text" id="ra" name="ra" placeholder="Registro Acadêmico">
                </div>

                <div class="campo">
                    <label for="nome">Nome do Aluno</label>
                    <input type="text" id="nome" name="nome">
                </div>

                <div class="campo">
                    <label for="turma">Turma</label>
                    <input type="text" id="turma" name="turma">
                </div>

                <div class="campo">
                    <label for="sala">Sala</label>
                    <input type="text" id="sala" name="sala">
                </div>

                <div class="campo">
                    <label for="periodo">Período</label>
                    <input type="text" id="periodo" name="periodo">
                </div>

                <button type="submit" class="btn-gradiente">Salvar</button>
            </form>
        </div>
    </main>

</body>
</html>
