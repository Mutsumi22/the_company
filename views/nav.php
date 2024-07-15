<nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <h3>THE COMPANY</h3>
        </a>

        <div class="navbar-nav">
            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                <span class="navbar-text"><?= $_SESSION['full_name']  ?></span>
                <button type="submit" class="text-danger btn  border-0">Logout</button>
            </form>
        </div>
    </div>

</nav>