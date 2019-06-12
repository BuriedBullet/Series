<style>
    .navbar{
        background-color: #166678;
    }
</style>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/logo_transparent.png" height="30" alt="Serie Time logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $_SESSION["ctr_nav"] == 1 ? "active" : "" ?>">
                    <a class="nav-link" href="cadastro_serie.php">
                        <i class="fas fa-home"></i> Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?= $_SESSION["ctr_nav"] == 2 ? "active" : "" ?>">
                    <a class="nav-link" href="cadastro_serie.php">
                        <i class="fas fa-address-card"></i> Cadastrar Série
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?= $_SESSION["ctr_nav"] == 3 ? "active" : "" ?>">
                    <a class="nav-link" href="Login.php">
                        <i class="fas fa-user"></i> Login
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="#">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>