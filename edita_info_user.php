<?php
include 'header.php';
include 'Funcoes.php';
?>

<?php
$_SESSION["ctr_nav"] = 3;
$user = (object)$_SESSION["user"];
?>

<?php
include 'navbar/nav_view.php';
?>

<main class="mt-4 py-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <p class="note note-danger invisible"><strong>Alerta:</strong></p>
                <p class="note note-danger d-none" id="paragrafo_alerta"><strong>Alerta:</strong> Ocorreu um erro ao tentar editar-lo as informações, por favor tente novamente e certifique de estar preenchendo os campos corretamente. </p>
                <form class="text-center border border-light p-5" method="post" action="edita_info_user.php" enctype="multipart/form-data">

                    <p class="h4 mb-4">Cadastro</p>

                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="text" id="defaultRegisterFormFirstName" name="nome" class="form-control" placeholder="Nome" value="<?= $user->nome ?>">
                        </div>
                        <div class="col">
                            <input type="text" id="defaultRegisterFormLastName" name="apelido" class="form-control" placeholder="Apelido" value="<?= $user->apelido ?>">
                        </div>
                    </div>
                    
                    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail" value="<?= $user->email ?>">

                    <input type="password" id="defaultRegisterFormPassword" name="senha" class="form-control" placeholder="Se não quiser alterar apenas deixe em branco" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Digite um 8 caracteres no minimo
                    </small>
                    
                    <input type="text" id="defaultRegisterFormImg" name="img" class="form-control" placeholder="Se não quiser alterar apenas deixe em branco" aria-describedby="defaultRegisterFormImgSmall"/>
                    <small id="defaultRegisterFormImgSmall" class="form-text text-muted mb-4">
                        Inserir endereço de link da imagem.
                    </small>

                    <button class="btn btn-info my-4 btn-block" type="submit">Editar</button>

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

?>

<script type="text/javascript">
    var result = <?= !empty($nome) && !empty($apelido) && !empty($email) ? edita_user() : 1 ?>;
    
    if(result === 2)
    {
        window.location.href = "perfil.php";
    }
    else if(result === 0)
    {
        $("#paragrafo_alerta").removeClass("d-none").addClass("d-block");
    }
</script>