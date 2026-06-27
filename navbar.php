<nav class="navbar navbar-dark bg-dark">
    <div class="container-md">
        <a class="navbar-brand" href="#">Projeto PHP</a>

        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="../../home.php" class="btn btn-primary float-end">Home</a>
            <a href="/pages/userPages/usuario-home.php" class="btn btn-primary float-end">Usuários</a>
            <a href="/pages/profissionalPages/profissional-home.php" class="btn btn-primary float-end">Profissionais</a>
            <a href="/pages/servicoPages/servico-home.php" class="btn btn-primary float-end">Procedimentos</a>
            <form action="Login/logout.php" method="POST" style="display:inline;">
                <button type="submit" class="btn btn-danger">
                    Sair
                </button>
            </form>
        <?php endif; ?>
    </div>
</nav>