<?php
include 'header.php';
include 'Funcoes.php';
?>

<?php 
if(!isset($_SESSION["id_serie"]) || empty($_SESSION["id_serie"]))
{
    header('Location: view.php');
}

if(!isset($_GET["temp"]))
{
    $temp = 1;
}
else
{
    $temp = $_GET["temp"];
}
$rst = select_serie($_SESSION["id_serie"]);
$table = select_eps($rst->id, $temp);
$serie_assis = select_assistido($rst->id);
$tamanho_assis = count($serie_assis) - 1;
$_SESSION["ctr_nav"] = 1;
?>

<?php 
include 'navbar/nav_assistido.php';
?>

<p class="note note-danger invisible"><strong>Alerta:</strong></p>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-image" style="background-image: url(<?= $rst->img ?>);height: 100%;background-size: cover;">
                    <div class="py-5 px-4">
                        <div>
                            <p class="invisible">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem, optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos. Odit sed qui, dolorum!.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2 offset-md-10">
                        <select class="form-control" id="select_temp">
                            <?php for($i=1;$i<=$rst->qtd_temp;$i++): ?>
                            <option value="<?= $i?>" <?= $temp == $i ? "selected" : "" ?>> <?= $i ?>º Temporada </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <br/>
                <div class="table-resposive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td width="10%" class="text-center">Ep</td>
                                <td width="80%">Nome</td>
                                <td width="10%" class="text-center">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($table as $item): 
                            $verifica = 0;    
                            ?>
                            <tr>
                                <td class="text-center"><?= $item->episodio ?></td>
                                <td><?= $item->nome ?></td>
                                <td class="text-center">
                                <?php foreach($serie_assis as $key => $value): ?>
                                    
                                    <?php if($value->id_episodio == $item->id): ?>
                                    
                                        <a href="naoassistido.php?id_assistido=<?=$value->id?>"><i class="fas fa-eye green-text"></i></a>
                                        <?php $verifica = 1; ?>
                                        
                                    <?php elseif(($key == $tamanho_assis && $verifica == 0)): ?>
                                        
                                        <a href="assistido.php?id_serie=<?=$rst->id?>&id_ep=<?=$item->id?>"><i class="fas fa-eye"></i></a>
                                        
                                    <?php endif; ?>
                                        
                                <?php endforeach; ?>
                                        
                                <?php if(empty($serie_assis)): ?>
                                        
                                    <a href="assistido.php?id_serie=<?=$rst->id?>&id_ep=<?=$item->id?>"><i class="fas fa-eye"></i></a>
                                    
                                <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<p class="note note-danger invisible"><strong>Alerta:</strong></p>
<?php
include 'footer.php';
?>

<script type="text/javascript">
    $("#select_temp").on("change", function(){
        var temp = $("#select_temp").val();
        
        window.location.href = "view_serie.php?temp="+temp;
    });
</script>

