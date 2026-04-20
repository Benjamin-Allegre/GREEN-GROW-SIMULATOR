<?php
    $title = 'Acheter ferme';
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

        <h2>Acheter une nouvelle ferme</h2>

        <div class="badge bg-success fs-6">
            💰 <?= $user->money() ?? 0 ?> GC
        </div>

    </div>
    <!-- affichage de la carte de la ferme séléctionner -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card col-md-6 p-3">
            <img src="images/cultureExterieur/<?= $ferme->id()  ?>.png" class="card-img-top" alt="<?=  $ferme->nom()  ?>">
            <div class="card-body">
                <h5 class="card-text"><?= $ferme->nom() ?></h5>
                <h6 class="card-text"><?=  $ferme->capacite() ?> Plants</h6>
                <p class="card-text"><?= $ferme->description() ?></p>
                <p class="card-text"><?= $ferme->prix() ?>  Green Coin</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<script src="js/quests.js"></script>
<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>