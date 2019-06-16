<?php
include 'header.php';
include 'Funcoes.php';
?>

<?php 
$user = (object)$_SESSION["user"];
$all_serie_ass = select_serie_user($user->id);
$all_serie_vc = select_serie_user_cria($user->id);
$i = 0;
$j = 0;
?>

<?php
include 'navbar/nav_view.php';
?>

<style>
    body, html {
        height: 100%;
    }

    .bg { 
      /* The image used */
      background-image: url("<?= $all_serie_ass[0]->serie->img_fund ?>");

      /* Full height */
      height: 50%; 

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
</style>
<p class="note note-danger invisible"><strong>Alerta:</strong></p>
<div class="bg"></div>
<div class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body" style="background-color: #fafafa">
                        <div class="h4-responsive card-title text-center">Dados do Usuario</div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <img src="<?= $user->img ?>" class="img-fluid rounded-circle" style="width:240px; height:240px"/>
                            </div>
                            <div class="col-md-9 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <h5 class="text-left">Nome: </h5>
                                        <p><i class="fas fa-angle-right"></i> <?= $user->nome ?></p>
                                        <br/>
                                        <h5 class="text-left">Apelido: </h5>
                                        <p><i class="fas fa-angle-right"></i> <?= $user->apelido ?></p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h5 class="text-left">Email: </h5>
                                        <p><i class="fas fa-angle-right"></i> <?= $user->email ?></p>
                                        <br/>
                                        <a href="edita_info_user.php" class="btn btn-default mr-auto">Editar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="note note-danger invisible"><strong>Alerta:</strong></p>
        <p class="note note-secondary"><strong>Séries e/ou Animes sendo e/ou já Assistidos</strong></p>
        <div class="row">
            
            <?php foreach($all_serie_ass as $item): ?>
            
            <?php $i++ ?>
            
            <div class="col-sm-4 col-lg-2">
                <a class="card_serie" data-id="<?= $item->serie->id ?>">
                    <div class="card card-image" style="background-image: url(<?= $item->serie->img ?>);height: 100%;background-size: cover;">
                        <div class="py-5 px-4">
                            <div>
                                <p class="invisible">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem, optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos. Odit sed qui, dolorum!.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <h5 class="card-title pt-2"><strong><?= $item->serie->nome ?></strong></h5>
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
        <p class="note note-danger invisible"><strong>Alerta:</strong></p>
        <p class="note note-danger invisible"><strong>Alerta:</strong></p>
        <p class="note note-danger"><strong>Séries e/ou Animes que você adicionou ao Séries Time</strong></p>
        <div class="row">
            
            <?php foreach($all_serie_vc as $item): ?>
            
            <?php $j++ ?>
            
            <div class="col-sm-4 col-lg-2">
                <a class="card_serie_edita" data-id="<?= $item->id ?>">
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
            elseif(verifica_mobile() == 0 && $j%6==0):
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
        <p class="note note-danger invisible"><strong>Alerta:</strong></p>
        <p class="note note-danger invisible"><strong>Alerta:</strong></p>
    </div>
</div>

<?php
include 'footer.php';
?>

<script type="text/javascript">
    $(".card_serie_edita").on("click", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        
        window.location.href = "edita_serie.php?id="+id;
    });
    $(".card_serie").on("click", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        
        window.location.href = "redirect.php?id="+id;
    });
</script>