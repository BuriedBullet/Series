<?php
include 'header.php';
include 'Funcoes.php';
?>

<?php
$_SESSION["pagina"] = "1";
?>

<?php 
include 'navbar/navbar_L.php';
?>

<main class="mt-4 py-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <p class="note note-danger invisible"><strong>Alerta:</strong></p>
                <p class="note note-danger d-none" id="paragrafo_alerta"><strong>Alerta:</strong> Ocorreu um erro ao tentar cadastra-lo, por favor tente novamente e certifique de estar preenchendo os campos corretamente. </p>
                <form class="text-center border border-light p-5" method="post" action="Cadastro.php" enctype="multipart/form-data">

                    <p class="h4 mb-4">Cadastro</p>

                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="text" id="defaultRegisterFormFirstName" name="nome" class="form-control" placeholder="Nome">
                        </div>
                        <div class="col">
                            <input type="text" id="defaultRegisterFormLastName" name="apelido" class="form-control" placeholder="Apelido">
                        </div>
                    </div>
                    
                    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">

                    <input type="password" id="defaultRegisterFormPassword" name="senha" class="form-control" placeholder="Senha" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Digite um 8 caracteres no minimo
                    </small>
                    
                    <input type="text" id="defaultRegisterFormImg" name="img" class="form-control" placeholder="Imagem de avatar" aria-describedby="defaultRegisterFormImgSmall"/>
                    <small id="defaultRegisterFormImgSmall" class="form-text text-muted mb-4">
                        Inserir endereço de link da imagem.
                    </small>

                    <button class="btn btn-info my-4 btn-block" type="submit">Cadastrar</button>

                    <hr>

                    <!-- Terms of service -->
                    <p>By clicking
                        <em>Sign up</em> you agree to our
                        <a href="" target="_blank">terms of service</a>

                </form>
                <p class="note note-danger invisible"><strong>Alerta:</strong></p>
            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>

<?php
@$nome = $_POST["nome"];
@$apelido = $_POST["apelido"];
@$email = $_POST["email"];
@$senha = $_POST["senha"];
?>

<script type="text/javascript">
    var result = <?= !empty($nome) && !empty($apelido) && !empty($email) && !empty($senha) ? inseri_user() : 1 ?>;
    
    if(result === 2)
    {
        window.location.href = "Login.php";
    }
    else if(result === 0)
    {
        $("#paragrafo_alerta").removeClass("d-none").addClass("d-block");
    }
</script>