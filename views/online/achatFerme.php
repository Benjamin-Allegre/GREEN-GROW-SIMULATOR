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
            <form id="acheterFerme" action="php/actions/acheter/acheterFermeExtAction.php" method="POST">

                <input type="hidden" value="<?= $ferme->id() ?>" name="fermeId" id="fermeId" />

                <label for="pays">Choisissez un pays :</label>
                <?php if (!empty($paysDisponibles)) { ?>

                <select id="pays" name="pays">
                    <?php foreach($paysDisponibles as $p): ?>
                        <option value="<?= $p->id() ?>">
                            <?= $p->nom() ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            <?php } else { ?>

                <p style="color:red;">
                    Vous devez d'abord acheter le niveau précédent pour débloquer cette exploitation.
                </p>

            <?php } ?>
                
            </form>
            <button form="acheterFerme" type="submit" class="btn btn-success btn-sm mb-2">Acheter</button>
            <a href="index.php?action=immmobilier" class="btn btn-success btn-sm">Retour</a>
            <div class="text-danger text-center">
                <?php if(isset($_GET['err'])){ ?> 
                    <p><?= $_GET['err'] ?></p>
                <?php } ?>
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