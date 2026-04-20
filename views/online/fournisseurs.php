<?php
    $title = 'Fournisseurs';
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

        <h2>Fournisseurs</h2>

        <div class="badge bg-success fs-6">
            💰 <?= $user->money() ?? 0 ?> GC
        </div>

    </div>
    <div class="row">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-Graine-tab" data-bs-toggle="tab" data-bs-target="#nav-graines" type="button" role="tab" aria-controls="nav-graines" aria-selected="true">Graines</button>
                <button class="nav-link" id="nav-materiels-tab" data-bs-toggle="tab" data-bs-target="#nav-materiels" type="button" role="tab" aria-controls="nav-materiels" aria-selected="false">Matériels</button>
                <button class="nav-link" id="nav-employers-tab" data-bs-toggle="tab" data-bs-target="#nav-employers" type="button" role="tab" aria-controls="nav-employers" aria-selected="false">Employers</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-graines" role="tabpanel" aria-labelledby="nav-graines-tab" tabindex="0">
                    <div class="row">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-graine-ext-tab" data-bs-toggle="tab" data-bs-target="#nav-graine-ext" type="button" role="tab" aria-controls="nav-graine-ext" aria-selected="true">Extérieur</button>
                                <button class="nav-link" id="nav-int-tab" data-bs-toggle="tab" data-bs-target="#nav-graine-int" type="button" role="tab" aria-controls="nav-graine-int" aria-selected="false">Intérieur</button>
                                <button class="nav-link" id="nav-graine-hydro" data-bs-toggle="tab" data-bs-target="#nav-graine-hydro" type="button" role="tab" aria-controls="nav-graine-hydro" aria-selected="false">Hydroponique</button>
                                <button class="nav-link" id="nav-graine-aero-tab" data-bs-toggle="tab" data-bs-target="#nav-graine-aero" type="button" role="tab" aria-controls="nav-graine-aero" aria-selected="false">Aéroponique</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-graine-ext" role="tabpanel" aria-labelledby="nav-graine-ext-tab" tabindex="1">
                                
                                <div class="row g-3">
                                <?php foreach($grainesExt as $graineExt): ?>
                                    
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                        
                                        <div class="card p-3 text-center h-100">

                                            <h5><?= $graineExt->nom() ?></h5>

                                            <img 
                                                src="images/graines/exterieur/0.png" 
                                                alt="<?= $graineExt->nom() ?>" 
                                                class="img-fluid mx-auto d-block"
                                                style="max-height:150px; object-fit:contain;"
                                            >

                                            <p><?= $graineExt->description() ?></p>

                                            <?php if($user->money() < $graineExt->prix()): ?>
                                                
                                                <a href="#" class="btn btn-success btn-sm disabled">
                                                    Il vous manque <?= $graineExt->prix() - $user->money() ?> GC
                                                </a>

                                            <?php else: ?>

                                                <a href="#" class="btn btn-success btn-sm">
                                                    Acheter pour <?= $graineExt->prix() ?> GC
                                                </a>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                <?php endforeach; ?>
</div>
                                
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="1">
                                
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="1">...</div>
                            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="1">...</div>
                        </div>
                    </div>
                   
                           
                
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">

            </div>
        </div>
    </div>
    
    

</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<script src="js/quests.js"></script>
<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>