<style>
    @media (min-width: 992px) {
        .img_fund{
            max-height: 920px;
            max-width: 1920px;
        }
    }
    
    .titulo_index {
        font-family: 'Teko', sans-serif;
    }
    .text-carrousel{
        font-family: 'Source Serif Pro', serif;
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
    header
</style>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <a class="navbar-brand" href="#">
            <img src="assets/img/logo_transparent.png" height="30" alt="Serie Time logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i> Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Cadastro.php">
                        <i class="fas fa-address-card"></i> Cadastrar
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">
                        <i class="fas fa-user"></i> Login
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="view">
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
                <li data-target="#carousel-example-2" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                        <img class="w-100 img_fund" src="assets/img/lucifer.jpg" alt="First slide">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive wow fadeInDown text-carrousel" data-wow-delay="0.3s">Lucifer</h3>
                        <p class="wow fadeInDown text-carrousel" data-wow-delay="0.3s">Netflix</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view">
                        <img class="w-100 img_fund" src="assets/img/tatetoyuusha.png" alt="Second slide">
                        <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive wow fadeInDown text-carrousel" data-wow-delay="0.3s">Tate no Yuusha no Nariagari</h3>
                        <p class="wow fadeInDown text-carrousel" data-wow-delay="0.3s">Anime</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view">
                        <img class="w-100 img_fund" src="assets/img/gameofthrones.jpg" alt="Third slide">
                        <div class="mask rgba-black-slight"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive wow fadeInDown text-carrousel" data-wow-delay="0.3s">Game of Thrones</h3>
                        <p class="wow fadeInDown text-carrousel" data-wow-delay="0.3s">HBO</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</header>