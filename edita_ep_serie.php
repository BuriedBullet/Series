<?php
include 'header.php';
include 'Funcoes.php';
?>

<?php
$id_serie = $_GET["id"];
$qtd_temp_ant = $_GET["qtd_temp_ant"];
$query = select_ep_serie($id_serie);
$rst = select_qtd_temp($_SESSION["id_serie"]);
$i=0;
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
                <form class="text-center border border-light p-5" method="post" action="Cadastro_ep_serie.php">
                    <p class="h4 mb-4">Edição dos Episodio das Temporadas - <?= $rst["nome"] ?></p>
                    
                    <?php while($i != $rst["qtd_temp"]): ?>
					
                    <?php $i = $i+1; ?>
					
					<div class="temp<?= $i ?> mb-4">
						<p class="note note-info mb-4"><strong><?= $i ?>ª Temporada</strong></p>
                    
					<?php foreach($query as $item): ?>
					
						<?php if($item->temporada == $id): ?>
						
						<div class="inputs<?= $i ?>">
													
							<div class='input-group mb-3'>
								<input type='text' class='form-control' placeholder='<?= $item->episodio ?>º Episodio' name='temp_ja_salva' aria-label='<?= $item->episodio ?>º Episodio' aria-describedby='<?= $item->episodio ?>º Episodio' value="<?= $item->nome ?>" readonly>
								<div class='input-group-append'>
									<span class='input-group-text' id='<?= $item->episodio ?>º Episodio'><?= $item->episodio ?>º Episodio</span>
								</div>
							</div>
							<a class="edit" data-id="<?= $item->id ?>"><i class="fas fa-edit"></i></a>
							
                        </div>
						
						<?php elseif: ?>
						
						<div class="row mb-4">
                            <div class="offset-md-10 col-md-2 text-right">
                                <a class="remove" data-id="<?= $i ?>"><i class="fas fa-minus-circle red-text  fa-2x"></i></a>
                                <a class="add" data-id="<?= $i ?>"><i class="fas fa-plus-circle green-text fa-2x"></i></a>
                            </div>
                        </div>
						<div class="inputs<?= $i ?>">
													
							<div class='input-group mb-3'>
								<input type='text' class='form-control' placeholder='<?= $item->episodio ?>º Episodio' name='temp[]' aria-label='<?= $item->episodio ?>º Episodio' aria-describedby='<?= $item->episodio ?>º Episodio' value="<?= $item->nome ?>" readonly>
								<div class='input-group-append'>
									<span class='input-group-text' id='<?= $item->episodio ?>º Episodio'><?= $item->episodio ?>º Episodio</span>
								</div>
							</div>
							<a class="edit" data-id="<?= $item->id ?>"><i class="fas fa-edit"></i></a>
							
                        </div>
						
						<?php endif; ?>
					
					<?php endforeach; ?>
					
					</div>
                        
					<input type="hidden" name="temp[]" value="koenokatachi" />
                    
                    <?php endwhile; ?>
                    
                    <hr>
					<input type="hidden" name="qtd_temp_ant" value="<?= $qtd_temp_ant ?>" />
                    <input type="hidden" name="id_serie" value="<?= $rst["id"] ?>" />
                    <div class="text-right"><button class="btn btn-info my-4" type="submit">Salvar</button></div>
                </form>
                <p class="note note-danger invisible"><strong>Alerta:</strong></p>
            </div>
        </div>
    </div>
</main>

<?php 
include 'footer.php';
?>

<script type="text/javascript">
var cont = [];
for(i=0;i<<?= $rst["qtd_temp"] ?>;i++)
{
    cont[i] = 0;
}
$(".add").on('click', function(e){
    e.preventDefault();
    var temp = $(this).data("id");
    if(cont[temp-1] < 0)
    {
        cont[temp-1] = 0;
    }
    cont[temp-1] = cont[temp-1] + 1;
    var bloco = "<div class='input-group mb-3'><input type='text' class='form-control' placeholder='"+cont[temp-1]+"º Episodio' name='temp[]' aria-label='"+cont[temp-1]+"º Episodio' aria-describedby='"+cont[temp-1]+"º Episodio'><div class='input-group-append'><span class='input-group-text' id='"+cont[temp-1]+"º Episodio'>"+cont[temp-1]+"º Episodio</span></div></div>";
    $(".inputs"+temp).append(bloco);
});

$(".remove").on("click", function(e){
    e.preventDefault();
    var temp = $(this).data("id");
    $('.inputs'+temp).find('.input-group').last().remove();
    if(cont[temp-1] <= 0)
    {
        cont[temp-1] = 0;
    }
    cont[temp-1] = cont[temp-1] - 1;
});

var result = <?= !empty($_POST["temp"]) ? inseri_new_episodios() : 1 ?>;
if(result === 0)
{
    $("#paragrafo_alerta").removeClass("d-none").addClass("d-block");
}
else if(result === 2)
{
    window.location.href = "view.php";
}

</script>