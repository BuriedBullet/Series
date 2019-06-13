<?php 
include 'header.php';
$_SESSION["ctr_nav"] = 2;
$_SESSION["pagina"] = 2;
include 'navbar/nav_view.php';
include 'Funcoes.php';
$categoria = select_categoria();
$status = select_status();
?>

<main class="mt-4 py-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <form class="text-center border border-light p-5" method="post" action="Login.php">

                    <p class="h4 mb-4">Cadastro de Série e Anime</p>

                    <input type="text" id="defaultRegisterFormName" class="form-control mb-4" name="nome" placeholder="Nome">
                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="text" id="defaultRegisterFormProdutora" name="produtora" class="form-control" placeholder="Produtora">
                        </div>
                        <div class="col">
                            <input type="text" id="defaultRegisterFormAnoLancamento" name="ano_lancamento" class="form-control" placeholder="Ano de Lançamento">
                        </div>
                    </div>
                    
                    <input type="text" id="defaultRegisterFormAnoLancamento" name="img" class="form-control" placeholder="Imagem">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Coloque o endereço de link da imagem
                    </small>
                    
                    <input type="text" id="defaultRegisterFormAnoLancamento" name="img_fund" class="form-control" placeholder="Imagem de Fundo">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Coloque o endereço de link da imagem
                    </small>
                    
                    <div class="form-group blue-border-focus mb-4">
                        <textarea class="form-control" id="exampleFormControlTextarea5" name="descricao" rows="3" placeholder="Descrição sobre a Série/Anime"></textarea>
                    </div>
                    
                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="text" id="defaultRegisterFormTemporadas" name="qtd_temp" class="form-control mb-4" placeholder="Quantidade de Temporadas">                        </div>
                        <div class="col">
                            <select class="browser-default custom-select">
                                <option selected>Status da Série/Anime</option>
                                <?php foreach($status as $item): ?>
                                <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <h5>Categoria</h5>
                    <div class="row">
                    <?php foreach($categoria as $key => $item): ?>
                    <div class="col-md-2">
                        <div class="custom-control custom-checkbox mb-4">
                            <input type="checkbox" class="custom-control-input" id="defaultInline<?= $key ?>" name="categoria" value="<?= $item->id ?>">
                            <label class="custom-control-label" for="defaultInline<?= $key ?>"><?= $item->nome ?></label>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    
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

<?php include 'footer.php' ?>

<?php
    @$nome = $_POST["nome"];
    @$produtora = $_POST["produtora"];
?>

