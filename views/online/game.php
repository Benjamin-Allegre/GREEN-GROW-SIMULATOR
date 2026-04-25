<?php
    $title = 'Siège social';
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

        <h2>🌱 Siège social</h2>

        <div class="badge bg-success fs-6">
            💰 <?= $user->money() ?? 0 ?> GC
        </div>

    </div>

    <!-- MODULES QUEST -->
    <div class="row g-3">

        <div class="col-md-6">
            <div class="card p-3">
                <h5>📜 Quêtes en cours</h5>
                
                    <?php foreach(array_slice($questsActive, 0, 5) as $questActive): ?>

                        <div 
                            class="quest-item mb-2 p-2 border rounded"
                            data-id="<?= $questActive->id(); ?>"
                            onclick="openQuest(this)"
                            style="cursor:pointer;"
                        >
                            <?= htmlspecialchars($questActive->quest_name()); ?>
                        </div>

                    <?php endforeach; ?>
                
                <a href="" class="btn btn-success btn-sm">Quêtes</a>
            </div> 
            <!-- ✅ MODAL (UNE SEULE FOIS) -->
            <div class="modal fade" id="questModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <div class="modal-header">
                            <h5 class="modal-title">Détail de la quête</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            
                        </div>

                        <div class="modal-body" id="questContent"></div>

                    </div>
                </div>
                </div>
        </div>

         <div class="col-md-6">
            <div class="card p-3">
                <h5>📜 Succès en cours</h5>

                <?php foreach(array_slice($successActive, 0, 5) as $successActive): ?>

                    <div 
                        class="quest-item mb-2 p-2 border rounded"
                        data-id="<?= $successActive->id(); ?>"
                        onclick="openQuest(this)"
                        style="cursor:pointer;"
                    >
                        <?= htmlspecialchars($successActive->success_name()); ?>
                    </div>

                <?php endforeach; ?>

                <a href="" class="btn btn-success btn-sm">Quêtes & Succès</a>
            </div> 
            
        </div>
    </div>
    <!-- MODULES FUTURS -->
    <div class="row g-3 text-center">
        <h5>🌾 Exploitations</h5>
        <div class="col-md-12 ">
            <?php if(isset($_GET['achatFerme'])){ ?>
                    <p class="text-success"><?= $_GET['achatFerme'] ?></p>
            <?php } ?>
        </div>
        <div class="col-md-3">
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

        <div class="col-md-3">
            <div class="card p-3">
                <h5>🌾 Culture Intérieur</h5>
                <p>Fermes cannabicole intérieur</p>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Pays</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php if(!empty($userFermesInt)){ 
                                foreach(array_slice($userFermesInt, 0, 5) as $userFermeInt) : 
                                $pays = $paysManager->getPays($userFermeInt->pays_id()); ?>

                                    <tr>
                                        <td><?= $pays->nom() ?></td>
                                        <td><?= $userFermeInt->niveau() ?></td>
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
                <a href="index.php?action=allFermesInt" class="btn btn-success btn-sm">Accéder</a>
            </div>
        </div>

        <div class="col-md-3">
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
                                        <td><?= $userFermeHydro->niveau() ?></td>
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
        <div class="col-md-3">
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