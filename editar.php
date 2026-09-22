<?php
    include "conexao.php";

    // O botão do relatório usa a url editar.php?<id> (sem nome de parâmetro),
    // então o id chega em QUERY_STRING em vez de em $_GET.
    $id = (int) $_SERVER['QUERY_STRING'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $ra      = trim($_POST['ra']      ?? '');
        $nome    = trim($_POST['nome']    ?? '');
        $turma   = trim($_POST['turma']   ?? '');
        $sala    = trim($_POST['sala']    ?? '');
        $periodo = trim($_POST['periodo'] ?? '');
        $id_post = (int) ($_POST['id']    ?? 0);

        try {
            $sql = "UPDATE alunos
                       SET ra = :ra, nome = :nome, turma = :turma, sala = :sala, periodo = :periodo
                     WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ra', $ra);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':turma', $turma);
            $stmt->bindParam(':sala', $sala);
            $stmt->bindParam(':periodo', $periodo);
            $stmt->bindParam(':id', $id_post);
            $stmt->execute();

            header("Location: relatorio.php");
            exit;

        } catch (PDOException $erro) {
            die("Erro ao atualizar o aluno: " . $erro->getMessage());
        }
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM alunos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        die("Erro ao buscar o aluno: " . $erro->getMessage());
    }

    if (!$aluno) {
        die("Aluno não encontrado.");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

    <?php include "menu.php"; ?>

    <main>
        <div class="cartao-vidro cartao-estreito">
            <h2>Editar Aluno</h2>

            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $aluno['id'] ?>">

                <div class="campo">
                    <label for="ra">RA</label>
                    <input type="text" id="ra" name="ra" value="<?= htmlspecialchars($aluno['ra']) ?>">
                </div>

                <div class="campo">
                    <label for="nome">Nome do Aluno</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($aluno['nome']) ?>">
                </div>

                <div class="campo">
                    <label for="turma">Turma</label>
                    <input type="text" id="turma" name="turma" value="<?= htmlspecialchars($aluno['turma']) ?>">
                </div>

                <div class="campo">
                    <label for="sala">Sala</label>
                    <input type="text" id="sala" name="sala" value="<?= htmlspecialchars($aluno['sala']) ?>">
                </div>

                <div class="campo">
                    <label for="periodo">Período</label>
                    <input type="text" id="periodo" name="periodo" value="<?= htmlspecialchars($aluno['periodo']) ?>">
                </div>

                <button type="submit" class="btn-gradiente">Salvar Alterações</button>
                <br><br>
                <a href="relatorio.php" class="btn-contorno">Cancelar</a>
            </form>
        </div>
    </main>

</body>
</html>
