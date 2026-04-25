<?php
    $title = 'Fermes Int';
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

        <h2>🌱 Fermes Intérieur </h2>

        <div class="badge bg-success fs-6">
            💰 <?= $user->money() ?? 0 ?> GC
        </div>

    </div>
    <!-- MODULES FERMES EXTERIEUR -->
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
                <?php if(!empty($userFermesInt)){ 
                        foreach($userFermesInt as $userFermeInt) :
                            $pays = $paysManager->getPays($userFermeInt->pays_id()); 
                            $ferme = $fermesManager->getFerme($userFermeInt->ferme_id()); ?>
                                <tr>
                                    <td><?= $pays->nom() ?></td>
                                    <td><?=  $pays->population() ?></td>
                                    <td><?= $userFermeInt->niveau() ?></td>
                                    <td><?= $ferme->capacite() ?></td>
                                    <td><a href="" class="btn btn-success btn-sm">GO</a></td>
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
    <!-- MODULES FERME AUTRE TYPE -->
    <div class="row g-3 text-center">
        <h5>🌾 FERMES </h5>
        
        <div class="col-md-4">
            <div class="card p-3">
                <h5>🌾 Culture Extérieur</h5>
                <p>Fermes cannabicole extérieur</p>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Pays</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php if(!empty($userFermesExt)){  
                                foreach(array_slice($userFermesExt, 0, 5) as $userFermeExt) :
                                 $pays = $paysManager->getPays($userFermeExt->pays_id());?>
                                    <tr>
                                        <td><?= $pays->nom() ?></td>
                                        <td><?= $userFermeExt->niveau() ?></td>
                                        <td><a href="" class="btn btn-success btn-sm">GO</a></td>
                                    </tr>
                    <?php       endforeach; 
                           }else{ ?>
                                <tr>
                                    <td colspan="3">Aucune fermes</td>
                                </tr>
                                
                    <?php  } ?>
                            </tbody>
                        </table>
                <a href="index.php?action=allFermesExt" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>🌾Culture Hydropinique</h5>
                <p>Fermes cannabicole Hydro</p>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Pays</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php if(!empty($userFermesHydro)){ 
                                foreach(array_slice($userFermesHydro, 0, 5) as $userFermeHydro) :?>
                                    <tr>
                                        <td><?= $pays->nom() ?></td>
                                        <td><?= $userFermeExt->niveau() ?></td>
                                        <td><a href="" class="btn btn-success btn-sm">GO</a></td>
                                    </tr>
                    <?php       endforeach; 
                           }else{ ?>
                                <tr>
                                    <td colspan="3">Aucune fermes</td>
                                </tr>
                                
                    <?php  } ?>
                            </tbody>
                        </table>
                <a href="index.php?action=allFermesHydro" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h5>🌾 Culture Aéroponique</h5>
                <p>Fermes cannabicole aéro</p>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Pays</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php if(!empty($userFermesAero)){ 
                                foreach(array_slice($userFermesAero, 0, 5) as $userFermeAero) :?>
                                    <tr>
                                        <td><?= $pays->nom() ?></td>
                                        <td><?= $userFermeAero->niveau() ?></td>
                                        <td><a href="" class="btn btn-success btn-sm">GO</a></td>
                                    </tr>
                    <?php       endforeach; 
                           }else{ ?>
                                <tr>
                                    <td colspan="3">Aucune fermes</td>
                                </tr>
                                
                    <?php  } ?>
                            </tbody>
                        </table>
                <a href="index.php?action=allFermesAero" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>
    </div>
</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<script src="js/quests.js"></script>
<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>