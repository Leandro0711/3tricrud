<?php
    $pagina_atual = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-padrao navbar-expand">
    <div class="container">
        <span class="navbar-brand">CrudCerto</span>
        <div class="nav">
            <a class="nav-link <?= $pagina_atual === 'cadastro.php' ? 'active' : '' ?>" href="cadastro.php">Cadastro</a>
            <a class="nav-link <?= $pagina_atual === 'relatorio.php' ? 'active' : '' ?>" href="relatorio.php">Relatório</a>
        </div>
    </div>
</nav>
