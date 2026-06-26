<nav class="navbar navbar-dark bg-dark">
    <div class="container-md">
        <a class="navbar-brand" href="#">Projeto PHP</a>

        <?php if (isset($_SESSION['usuario_id'])): ?>
            <form action="Login/logout.php" method="POST" style="display:inline;">
                <button type="submit" class="btn btn-danger">
                    Sair
                </button>
            </form>
        <?php endif; ?>
    </div>
</nav>