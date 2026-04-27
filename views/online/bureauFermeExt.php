<?php
    $title = 'Bureau ferme';
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

        <h2>🌱 ferme </h2>

        <div class="badge bg-success fs-6">
            💰 <?= $user->money() ?? 0 ?> GC
        </div>

    </div>


    <!-- MODULES FERMES -->
    <div class="row g-3">
        <div class="col-md-12">
            <!-- affichage des stock entrepot en fonction des besion de culture -->
            <h5>Stock entreprot</h5>
            <h5>Réserve</h5>
            <h5>Planter</h5>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-12">
            <div class="card p-3">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Pays</th>
                            <th scope="col">Population</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Capacite</th>
                            <th scope="col">Go</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($userFermeExt)){ 
                        foreach($userFermesAero as $userFermeAero) :
                            $pays = $paysManager->getPays($userFermeAero->pays_id()); 
                            $ferme = $fermesManager->getFerme($userFermeAero->ferme_id()) ;?>
                                <tr>
                                    <td><?= $pays->nom() ?></td>
                                    <td><?=  $pays->population() ?></td>
                                    <td><?= $userFermeAero->niveau() ?></td>
                                    <td><?= $ferme->capacite() ?></td>
                                    <td><a href="index.php?action=bureauFermeInt&fermeId=<?= $userFermeInt->id() ?>" class="btn btn-success btn-sm">GO</a></td>
                                </tr>
                <?php   endforeach; 
                      }else{ ?>
                                <tr>
                                    <td colspan="5">Aucune fermes</td>
                                </tr>
                                
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<script src="js/quests.js"></script>
<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>