<?php
session_start();
$_SESSION["pagina"] = "1";
include 'header.php' ?>
<?php include 'navbar/navbar_L.php' ?>
<?php include 'Funcoes.php'?>

<main class="mt-4 py-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container">
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

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Imagem</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="img" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Selecione uma foto</label>
                        </div>
                    </div>

<!--                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
                    </div>-->

                    <button class="btn btn-info my-4 btn-block" type="submit">Cadastrar</button>

                    <hr>

                    <!-- Terms of service -->
                    <p>By clicking
                        <em>Sign up</em> you agree to our
                        <a href="" target="_blank">terms of service</a>

                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>

<?php

@$nome = $_POST["nome"];
@$apelido = $_POST["apelido"];
@$email = $_POST["email"];
@$senha = $_POST["senha"];

//&& !empty($apelido) && !empty($email) && !empty($senha)
if(!empty($nome))
{
    
    $dir = 'uploads/';        

        if(move_uploaded_file($_FILES["img"]["tmp_name"], $dir.$_FILES["img"]["name"]))
        {
//            $tamanho = filesize($_FILES["img"]["name"]);
            
            $mysqlImg = addslashes(fread(fopen($_FILES["img"]["name"], "r"), $tamanho));
            echo "Arquivo valido";
            
            echo '<pre>';
            print_r($_FILES);
            echo '</pre>';
            
            echo '<pre>';
            print_r($mysqlImg);
            echo '</pre>';
            exit;
        }
        else
        {
            echo "Erro";
        } 
}

?>