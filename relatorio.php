<?php
    include "conexao.php";

    try {
        $sql = "SELECT * FROM alunos ORDER BY id DESC";
        $stmt = $conn->query($sql);
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $erro_banco = null;
    } catch (PDOException $erro) {
        $alunos = [];
        $erro_banco = $erro->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

    <?php include "menu.php"; ?>

    <main>
        <div class="cartao-vidro tabela-container">

            <div class="tabela-topo">
                <h2>Relatório de Alunos</h2>
                <a href="cadastro.php" class="btn-gradiente btn-auto">+ Novo Aluno</a>
            </div>

            <?php if ($erro_banco): ?>
                <div class="alerta-erro">
                    Não foi possível carregar os dados do banco.<br>
                    Verifique se a tabela "alunos" existe (rode banco_escola.sql).<br>
                    Detalhe técnico: <?= htmlspecialchars($erro_banco) ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive-padrao">
                <table class="tabela-padrao">
                    <thead>
                        <tr>
                            <th>RA</th>
                            <th>Nome</th>
                            <th>Turma</th>
                            <th>Sala</th>
                            <th>Período</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($alunos) > 0): ?>
                            <?php foreach ($alunos as $aluno): ?>
                                <tr>
                                    <td><?= htmlspecialchars($aluno['ra']) ?></td>
                                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                                    <td><?= htmlspecialchars($aluno['turma']) ?></td>
                                    <td><?= htmlspecialchars($aluno['sala']) ?></td>
                                    <td><?= htmlspecialchars($aluno['periodo']) ?></td>
                                    <td>
                                        <div class="acoes">
                                            <a href="editar.php?<?= $aluno['id'] ?>" class="btn-gradiente btn-sm">Editar</a>
                                            <a href="excluir.php?<?= $aluno['id'] ?>"
                                               class="btn-gradiente btn-perigo btn-sm"
                                               onclick="return confirm('Deseja realmente excluir este aluno?');">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="tabela-vazia">Nenhum aluno cadastrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
