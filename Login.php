<?php
include 'header.php';
include 'Funcoes.php';
?>

<?php
$_SESSION["pagina"] = "2";
?>

<?php
include 'navbar/navbar_L.php';
?>

<main class="mt-4 py-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <p class="note note-danger invisible" id="alerta"><strong>Alerta:</strong> Login e/ou Senha incorreto</p>
                <form class="text-center border border-light p-5" method="post" action="Login.php">

                    <p class="h4 mb-4">Login</p>

                    <input type="text" id="defaultRegisterFormLastName" class="form-control mb-4" name="email" placeholder="E-mail ou Apelido">

                    <input type="password" id="defaultRegisterFormPassword" name="senha" class="form-control" placeholder="Senha" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Digite um 8 caracteres no minimo
                    </small>

                    <button class="btn btn-info my-4 btn-block" type="submit">Entrar</button>

                    <hr>

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
?>

<?php
@$email = $_POST["email"];
@$senhas = $_POST["senha"];
?>

<script type="text/javascript">
    
    var result = <?= !empty($email) && !empty($senhas) ? user_acesso() : 1?>;
    if(result === 0)
    {
            $("#alerta").removeClass("invisible").addClass("visible");
    }
    else if(result === 2)
    {
        window.location.href = "view.php";
    }
</script>
  