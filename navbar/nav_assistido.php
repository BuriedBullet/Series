<style type="text/css">
    .intro-2 {
        background: url("<?= $rst->img_fund ?>")no-repeat center center;
        background-size: cover;
    }

    .navbar {
        background-color: transparent;
    }

    .top-nav-collapse {
        background-color: #166678;
    }

    @media only screen and (max-width: 768px) {
        .navbar {
            background-color: #166678;
        }
    }
    html,
    body,
    header,
    .view {
        height: 90%;
    }
</style>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <a class="navbar-brand" href="#"><strong>Navbar</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $_SESSION["ctr_nav"] == 1 ? "active" : "" ?>">
                    <a class="nav-link" href="view.php">
                        <i class="fas fa-compass"></i> Procurar
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?= $_SESSION["ctr_nav"] == 2 ? "active" : "" ?>">
                    <a class="nav-link" href="cadastro_serie.php">
                        <i class="fas fa-address-card"></i> Cadastrar Série
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= $_SESSION["user"]["img"] ?>" class="rounded-circle z-depth-0" alt="avatar image" height="35" width="35">
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="perfil.php">Perfil</a>
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="view intro-2" style="">
        <div class="full-bg-img">
            <div class="mask rgba-blue-grey-light flex-center">
                <div class="container text-center white-text wow fadeInUp">
                    <h2><?= $rst->nome ?></h2>
                    <br>
                    <h5><?= $rst->produtora ?> - <?= $rst->ano_lancamento ?></h5>
                    <p><?= $rst->qtd_temp > 1 ? $rst->qtd_temp." Temporadas" : $rst->qtd_temp."Temporada" ?> - <?= $rst->status->nome ?></p>
                    <br>
                    <p><?= $rst->descricao ?></p>
                </div>
            </div>
        </div>
    </div>
</header>