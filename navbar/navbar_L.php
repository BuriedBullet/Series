<?php
    if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
    {
        header('Location: view.php');
    }
?>

<style>
    .navbar{
        background-color: #166678;
    }
</style>

<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/logo_transparent.png" height="30" alt="Serie Time logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i> Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?= $_SESSION["pagina"] == "1" ? "active" : "" ?>">
                    <a class="nav-link" href="Cadastro.php">
                        <i class="fas fa-address-card"></i> Cadastrar
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?= $_SESSION["pagina"] == "2" ? "active" : "" ?>">
                    <a class="nav-link" href="Login.php">
                        <i class="fas fa-user"></i> Login
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>