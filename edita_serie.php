<?php
include 'header.php';
include 'Funcoes.php';
?>

<?php
$_SESSION["ctr_nav"] = 3;
if(isset($_GET["id_erro"]))
{
	$erro = $_GET["id_erro"];
}
$id_serie = $_GET["id"];
$cat = select_categoria();
$statu = select_status();
$query = select_serie($id_serie);
?>

<?php
include 'navbar/nav_view.php';
?>

<main class="mt-4 py-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <p class="note note-danger invisible"><strong>Alerta:</strong></p>
                <p class="note note-danger d-none" id="paragrafo_alerta"><strong>Alerta:</strong> Ocorreu um erro ao tentar editar a serie, por favor tente novamente e certifique de estar preenchendo os campos corretamente. </p>
				<p class="note note-danger <?= isset($erro) ? "d-block" : "d-none" ?>" id="paragrafo_alerta"><strong>Alerta:</strong> Occoreu um erro ao tentar apagar a série. </p>
                <form class="text-center border border-light p-5" method="post" action="cadastro_serie.php">

                    <p class="h4 mb-4">Editação - <?= $query->nome ?></p>

                    <input type="text" id="defaultRegisterFormName" class="form-control mb-4" name="nome" placeholder="Nome" value="<?= $query->nome ?>">
                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="text" id="defaultRegisterFormProdutora" name="produtora" class="form-control" placeholder="Produtora" value="<?= $query->produtora ?>">
                        </div>
                        <div class="col">
                            <input type="text" id="defaultRegisterFormAnoLancamento" name="ano_lancamento" class="form-control" placeholder="Ano de Lançamento" value="<?= $query->ano_lancamento ?>">
                        </div>
                    </div>
                    
                    <input type="text" id="defaultRegisterFormAnoLancamento" name="img" class="form-control" placeholder="Se não quiser alterar apenas deixe em branco">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Coloque o endereço de link da imagem
                    </small>
                    
                    <input type="text" id="defaultRegisterFormAnoLancamento" name="img_fund" class="form-control" placeholder="Se não quiser alterar apenas deixe em branco">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Coloque o endereço de link da imagem
                    </small>
                    
                    <div class="form-group blue-border-focus mb-4">
                        <textarea class="form-control" id="exampleFormControlTextarea5" name="descricao" rows="3" placeholder="Descrição sobre a Série/Anime"><?= $query->descricao ?></textarea>
                    </div>
                    
                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="number" id="defaultRegisterFormTemporadas" name="qtd_temp" class="form-control mb-4" placeholder="Quantidade de Temporadas" value="<?= $query->qtd_temp ?>"/>
                        </div>
                        <div class="col">
                            <select class="browser-default custom-select" name="status">
                                <option selected>Status da Série/Anime</option>
                                <?php foreach($statu as $item): ?>
                                <option value="<?= $item->id ?>" <?= $query->id_status == $item->id ? "selected" : "" ?>><?= $item->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <h5>Categoria</h5>
                    <div class="row">
                        <?php foreach($cat as $key => $item): ?>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox mb-4">
                                <input type="checkbox" class="custom-control-input" id="defaultInline<?= $key ?>" name="categoria[]" value="<?= $item->id ?>" <?= strpos($query->categoria, $item->nome) ? "checked" : "" ?>/>
                                <label class="custom-control-label" for="defaultInline<?= $key ?>"><?= $item->nome ?></label>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <input type="hidden" name="img_ant" value<?= $query->img ?> />
                    <input type="hidden" name="img_fund_ant" value<?= $query->img_fund ?> />
                    <input type="hidden" name="id_serie" value="<?= $query->id ?>" />
                    <input type="hidden" name="id_usuario" value="<?= $_SESSION["user"]["id"] ?>" />
                    
                    <div class="row">
                        <div class="col-md-4">
                            <a href="edita_ep_serie.php?id=<?= $id_serie ?>&qtd_temp_ant=<?= $query->qtd_temp ?>" class="btn btn-warning my-4 btn-block">Alterar Apenas os Episodios das Temporadas</a>
                        </div>
						<div class="col-md-4">
							<a class="btn btn-danger my-4 btn-block apaga_serie" data-id="<?= $query->id ?>">Apagar Serie</a>
						</div>
                        <div class="col-md-4">
                            <button class="btn btn-info my-4 btn-block" type="submit">Enviar</button>
                        </div>
                    </div>

                    <hr>

                    <!-- Terms of service -->
                    <p>By clicking
                        <em>Sign in</em> you agree to our
                        <a href="" target="_blank">terms of service</a>
                    </p>
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
    include 'footer.php';

    @$nome = $_POST["nome"];
    @$produtora = $_POST["produtora"];
    @$ano = $_POST["ano_lancamento"];
    @$descricao = $_POST["descricao"];
    @$qtd_temp = $_POST["qtd_temp"];
    @$categoria = $_POST["categoria"];
    @$status = $_POST["status"];
?>

<script type="text/javascript">

$(".apaga_serie").on('click', function(e){
	e.preventDefault();
	var id = $(this).data("id");
	window.location.href = "remove_serie.php?id="+id;
});

var result = <?= !empty($nome) && !empty($produtora) && !empty($ano) && !empty($descricao) && !empty($qtd_temp) && !empty($categoria) ? edita_serie() : 1 ?>

if(result === 0)
{
    $("#paragrafo_alerta").removeClass("d-none").addClass("d-block");
}
else if(result === 2)
{
    window.location.href = "edita_ep_serie.php?id=<?= $id_serie ?>&qtd_temp_ant=<?= $query->qtd_temp ?>";
}
elseif($result == 3)
{
	window.location.href = "perfil.php";
}
</script>