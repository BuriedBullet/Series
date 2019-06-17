<?php 
include 'header.php';
include 'Funcoes.php';
?>

<?php 
$_SESSION["ctr_nav"] = 1;
$id_cat = $_GET["id_cat"];
$query = select_all_series_cat($id_cat);
$cat = get_cat($id_cat);
$i = 0;
?>

<?php 
include 'navbar/nav_view.php';
?>

<p class="note note-danger invisible"><strong>Alerta:</strong></p>
<p class="note note-danger invisible"><strong>Alerta:</strong></p>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card teal text-center">
                <div class="card-body">
                    <p class="h5-responsive white-text mb-0"><?= $cat->nome ?></p>
                </div>
            </div>
        </div>
    </div>
    <p class="note note-danger invisible"><strong>Alerta:</strong></p>
    <div class="row">
        
        <?php foreach($query as $key => $item): ?>
        
            <?php $i++; ?>
        
            <div class="col-sm-4 col-lg-2">
                <a class="card_serie" data-id="<?= $item->id ?>">
                    <div class="card card-image" style="background-image: url(<?= $item->img ?>);height: 100%;background-size: cover;">
                        <div class="py-5 px-4">
                            <div>
                                <p class="invisible">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem, optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos. Odit sed qui, dolorum!.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <h5 class="card-title pt-2"><strong><?= $item->nome ?></strong></h5>
                    </div>
                </a>
            </div>
        
            <?php 
            if(verifica_mobile() == 1):
            ?>
        
            <p class="note note-danger invisible"><strong>Alerta:</strong></p>
            <p class="note note-danger invisible"><strong>Alerta:</strong></p>
                    
            <?php
            elseif(verifica_mobile() == 0 && $i%6==0):
            echo '</div>';
            ?>
            <div class="row">
                <p class="note note-danger invisible"><strong>Alerta:</strong></p>
            </div>
            <div class="row">
                <p class="note note-danger invisible"><strong>Alerta:</strong></p>
            </div>
            <?php 
            echo '<div class="row">';
            endif; 
            ?>
            
        <?php endforeach; ?>
        
    </div>
</div>

<p class="note note-danger invisible"><strong>Alerta:</strong></p>
<p class="note note-danger invisible"><strong>Alerta:</strong></p>
<?php include 'footer.php'; ?>

<script type="text/javascript">
    $(".card_serie").on("click", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        
        window.location.href = "redirect.php?id="+id;
    });
</script>