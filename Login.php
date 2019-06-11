<?php
session_start();
$_SESSION["pagina"] = "2";
include 'header.php' ?>
<?php include 'navbar/navbar_L.php' ?>
<?php include 'Funcoes.php'?>

<main class="mt-4 py-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <p class="note note-warning d-none" id="paragrafo_alerta"><strong>Alerta:</strong> Login e/ou Senha incorreto</p>
                <p class="note note-warning invisible"><strong>Alerta:</strong> Lorem, ipsum dolor sit amet consectetur adipisicing  elit. Cum doloremque officia laboriosam. Itaque ex obcaecati architecto! Qui necessitatibus delectus placeat  illo rem id nisi consequatur esse, sint perspiciatis soluta porro?</p>
                <form class="text-center border border-light p-5" method="post" action="Login.php">

                    <p class="h4 mb-4">Login</p>

                    <input type="text" id="defaultRegisterFormLastName" class="form-control mb-4" name="email" placeholder="E-mail Ou Apelido">

                    <input type="password" id="defaultRegisterFormPassword" name="senha" class="form-control" placeholder="Senha" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Digite um 8 caracteres no minimo
                    </small>

                    <button class="btn btn-info my-4 btn-block" type="submit">Entrar</button>

                    <hr>

                    <!-- Terms of service -->
                    <p>By clicking
                        <em>Sign in</em> you agree to our
                        <a href="" target="_blank">terms of service</a>

                </form>
            </div>
        </div>
    </div>
</main>
<?php 
include 'footer.php';

@$email = $_POST["email"];
@$senha = $_POST["senha"];

?>

<?php
if(!empty($nome) && !empty($senha))
{
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "series_time";

    $con = mysqli_connect($servidor, $usuario, $senha, $db);

    $query = "SELECT * FROM user";

    $result = mysqli_query($con, $query);

    while($item = mysqli_fetch_array($result))
    {
        echo '<pre>';
        print_r($item);
        echo '</pre>';
    }
}
?>
  