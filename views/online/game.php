<?php
    $title = 'Connexion';
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

        <h2>🌱 Game Hub</h2>

        <div class="badge bg-success fs-6">
            💰 <?= $user->money() ?? 0 ?> GC
        </div>

    </div>

    <!-- MODULES QUEST -->
    <div class="row g-3">

        <div class="col-md-6">
            <div class="card p-3">
                <h5>📜 Quêtes en cours</h5>

                <?php foreach ($quests as $q): ?>
                    <div class="border-bottom py-2">
                        <strong><?= $q['name'] ?></strong><br>
                        <small><?= $q['progress'] ?> / <?= $q['goal'] ?></small>
                    </div>
                <?php endforeach; ?>

                <a href="" class="btn btn-success btn-sm">Quêtes & Succès</a>
            </div> 
            
        </div>

         <div class="col-md-6">
            <div class="card p-3">
                <h5>📜 Succès en cours</h5>

                <?php foreach ($quests as $q): ?>
                    <div class="border-bottom py-2">
                        <strong><?= $q['name'] ?></strong><br>
                        <small><?= $q['progress'] ?> / <?= $q['goal'] ?></small>
                    </div>
                <?php endforeach; ?>

                <a href="" class="btn btn-success btn-sm">Quêtes & Succès</a>
            </div> 
            
        </div>
    </div>
    <!-- MODULES FUTURS -->
    <div class="row g-3">
        <h5>🌾 Exploitations</h5>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>🌾 culture Extérieur</h5>
                <p>Gère tes fermes cannabicole extérieur</p>
                <a href="" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>🌾 culture Intérieur</h5>
                <p>Achete graines et matériel.</p>
                <a href="" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>📊 Marché</h5>
                <p>Vends tes récoltes.</p>
                <a href="" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>📊 Marché</h5>
                <p>Vends tes récoltes.</p>
                <a href="" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>
    </div>

</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>