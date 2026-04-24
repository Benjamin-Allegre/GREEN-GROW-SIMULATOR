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
                
                <div class="row g-3">
                    <?php foreach($fermes as $ferme): 
                        
                         if($ferme->type_id() === 1): ?>

                            <div class="col-12 col-md-6 col-lg-4">

                                <div class="card p-3 text-center h-100">

                                    <h5><?= $ferme->nom() ?></h5>
                                    <h6><?= $ferme->capacite() ?> Plants</h6>
                                    <img 
                                        src="images/cultureExterieur/<?= $ferme->niveau() ?>.png" 
                                        alt="<?= $ferme->nom() ?>" 
                                        class="img-fluid mx-auto d-block"
                                        style="max-height:150px; object-fit:contain;"
                                    >

                                    <p><?= $ferme->description() ?></p>

                                    <?php if($user->money() < $ferme->prix()): ?>

                                        <button class="btn btn-success btn-sm disabled">
                                            Il vous manque <?= $ferme->prix() - $user->money() ?> GC
                                        </button>

                                    <?php else: ?>
                                        
                                        <a href="index.php?action=achatFerme&idAchat=<?= $ferme->id() ?>" 
                                        class="btn btn-success btn-sm">
                                            Acheter pour <?= $ferme->prix() ?> GC
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="row g-3">
                    <?php foreach($fermes as $ferme): 
                        
                         if($ferme->type_id() === 2): ?>

                            <div class="col-12 col-md-6 col-lg-4">

                                <div class="card p-3 text-center h-100">

                                    <h5><?= $ferme->nom() ?></h5>
                                    <h6><?= $ferme->capacite() ?> Plants</h6>
                                    <img 
                                        src="images/cultureInterieur/<?= $ferme->niveau() ?>.png" 
                                        alt="<?= $ferme->nom() ?>" 
                                        class="img-fluid mx-auto d-block"
                                        style="max-height:150px; object-fit:contain;"
                                    >

                                    <p><?= $ferme->description() ?></p>

                                    <?php if($user->money() < $ferme->prix()): ?>

                                        <button class="btn btn-success btn-sm disabled">
                                            Il vous manque <?= $ferme->prix() - $user->money() ?> GC
                                        </button>

                                    <?php else: ?>
                                        
                                        <a href="index.php?action=achatFerme&idAchat=<?= $ferme->id() ?>" 
                                        class="btn btn-success btn-sm">
                                            Acheter pour <?= $ferme->prix() ?> GC
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <div class="row g-3">
                    <?php foreach($fermes as $ferme): 
                        
                         if($ferme->type_id() === 3): ?>

                            <div class="col-12 col-md-6 col-lg-4">

                                <div class="card p-3 text-center h-100">

                                    <h5><?= $ferme->nom() ?></h5>
                                    <h6><?= $ferme->capacite() ?> Plants</h6>
                                    <img 
                                        src="images/cultureHydro/<?= $ferme->niveau() ?>.png" 
                                        alt="<?= $ferme->nom() ?>" 
                                        class="img-fluid mx-auto d-block"
                                        style="max-height:150px; object-fit:contain;"
                                    >

                                    <p><?= $ferme->description() ?></p>

                                    <?php if($user->money() < $ferme->prix()): ?>

                                        <button class="btn btn-success btn-sm disabled">
                                            Il vous manque <?= $ferme->prix() - $user->money() ?> GC
                                        </button>

                                    <?php else: ?>
                                        
                                        <a href="index.php?action=achatFerme&idAchat=<?= $ferme->id() ?>" 
                                        class="btn btn-success btn-sm">
                                            Acheter pour <?= $ferme->prix() ?> GC
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                <div class="row g-3">
                    <?php foreach($fermes as $ferme): 
                        
                         if($ferme->type_id() === 2): ?>

                            <div class="col-12 col-md-6 col-lg-4">

                                <div class="card p-3 text-center h-100">

                                    <h5><?= $ferme->nom() ?></h5>
                                    <h6><?= $ferme->capacite() ?> Plants</h6>
                                    <img 
                                        src="images/cultureAero/<?= $ferme->niveau() ?>.png" 
                                        alt="<?= $ferme->nom() ?>" 
                                        class="img-fluid mx-auto d-block"
                                        style="max-height:150px; object-fit:contain;"
                                    >

                                    <p><?= $ferme->description() ?></p>

                                    <?php if($user->money() < $ferme->prix()): ?>

                                        <button class="btn btn-success btn-sm disabled">
                                            Il vous manque <?= $ferme->prix() - $user->money() ?> GC
                                        </button>

                                    <?php else: ?>
                                        
                                        <a href="index.php?action=achatFerme&idAchat=<?= $ferme->id() ?>" 
                                        class="btn btn-success btn-sm">
                                            Acheter pour <?= $ferme->prix() ?> GC
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    


</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<script src="js/quests.js"></script>
<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>