<?php
    $title = 'Accueil';
    $content_css = '';
    $content_js = '';
?>

<!-- démarre la temporisation de sortie. Tant qu'elle est enclenchée,
    aucune donnée, hormis les en-têtes, n'est envoyée au navigateur,
    mais temporairement mise en tampon. -->
<?php ob_start(); ?>

<section class="container mt-5">
<!-- HERO -->
    <div class="text-center py-5">

        <h1 class="display-4 fw-bold">🌱 GreenGrow Simulator</h1>

        <p class="lead mt-3">
            Plante, cultive et développe ton propre empire agricole dans un univers de gestion stratégique.
        </p>

        <p class="text-muted">
            Commence avec une petite ferme, fais évoluer tes cultures et construis ton business.
        </p>

        <div class="mt-4">
            <a href="offline/login.php" class="btn btn-success btn-lg me-2">
                ▶ Jouer
            </a>

            <a href="offline/register.php" class="btn btn-outline-success btn-lg">
                Créer un compte
            </a>
        </div>

    </div>

    <hr class="my-5">

    <!-- FEATURES -->
    <div class="row text-center g-4">

        <div class="col-md-4">
            <div class="p-3 border rounded bg-light h-100">
                <h3>🌱 Cultivation</h3>
                <p>
                    Plante tes graines, gère leur croissance et optimise tes récoltes.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 border rounded bg-light h-100">
                <h3>⏱ Temps stratégique</h3>
                <p>
                    Chaque culture évolue dans le temps, avec des cycles uniques et évolutifs.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 border rounded bg-light h-100">
                <h3>💰 Économie</h3>
                <p>
                    Vends tes récoltes et développe ton activité agricole.
                </p>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <!-- WHY SECTION -->
    <div class="text-center">

        <h2 class="mb-3">Pourquoi jouer à GreenGrow ?</h2>

        <p class="text-muted mx-auto" style="max-width: 700px;">
            GreenGrow Simulator est un jeu de gestion agricole évolutif où chaque décision influence ton développement.
            Commence petit, pense stratégie, et fais évoluer ta ferme vers un empire complet.
        </p>

    </div>

</section>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>