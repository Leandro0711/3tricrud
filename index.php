<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrudCerto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

    <?php include "menu.php"; ?>

    <main>
        <div class="cartao-vidro cartao-estreito text-center">
            <h2>Bem-vindo</h2>
            <p class="mb-4" style="color: var(--cor-texto-suave);">
                Use o menu acima para cadastrar um aluno ou consultar o relatório.
            </p>
            <a href="cadastro.php" class="btn-gradiente">Novo Cadastro</a>
            <br><br>
            <a href="relatorio.php" class="btn-contorno">Ver Relatório</a>
        </div>
    </main>

</body>
</html>
