<?php
    $title = 'Immobilier';
    $content_css = '';
    $content_js = '';
?>

<!-- démarre la temporisation de sortie. Tant qu'elle est enclenchée,
    aucune donnée, hormis les en-têtes, n'est envoyée au navigateur,
    mais temporairement mise en tampon. -->
<?php ob_start(); ?>

<div class="container mt-4">

    <!-- HEADER PLAYER INFO -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Immobilier</h2>

        <div class="badge bg-success fs-6">
            💰 <?= $user->money() ?? 0 ?> GC
        </div>

    </div>
    <div class="row">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Extérieur</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Intérieur</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Hydroponique</button>
                <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Aéroponique</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                
                    <?php foreach($fermes as $ferme): 
                            if($ferme->type() === 'Extérieur'){ ?>
                                <div class="card p-3 text-center">
                                    <h5><?=  $ferme->nom() ?></h5>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <img src="images/cultureExterieur/<?= $ferme->id()  ?>.png" alt="<?=  $ferme->nom() ?>" width="250" height="150">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    

                                    <p><?=  $ferme->description() ?></p>
                                    <?php if($user->money() < $ferme->prix()){ ?>
                                        <a href="" class="btn btn-success btn-sm disabled">Il vous manque pour acheter cette ferme <?= $ferme->prix() - $user->money() ?> GC</a>
                                    <?php }else{ ?>
                                        <a href="" class="btn btn-success btn-sm">Acheter pour <?=  $ferme->prix() ?></a>
                                    <?php } ?>
                                    
                                </div>
                        <?php  }
                        endforeach; ?>
                
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <?php foreach($fermes as $ferme): 
                            if($ferme->type() === 'Intérieur'){ ?>
                                <div class="card p-3 text-center">
                                    <h5><?=  $ferme->nom() ?></h5>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <img src="images/cultureExterieur/<?= $ferme->id()  ?>.png" alt="<?=  $ferme->nom() ?>" width="250" height="150">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    

                                    <p><?=  $ferme->description() ?></p>

                                    <?php if($user->money() < $ferme->prix()){ ?>
                                        <a href="" class="btn btn-success btn-sm disabled">Il vous manque pour acheter cette ferme <?= $ferme->prix() - $user->money() ?> GC</a>
                                    <?php }else{ ?>
                                        <a href="" class="btn btn-success btn-sm">Acheter pour <?=  $ferme->prix() ?></a>
                                    <?php } ?>
                                </div>
                        <?php  }
                        endforeach; ?>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
        </div>
    </div>
    


</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<script src="js/quests.js"></script>
<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>