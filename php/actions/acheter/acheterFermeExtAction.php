<?php
    session_start();

    require_once('../../init.php');
    require_once __DIR__ . '../../../../models/autoload.php';

    // traitement des envoies par POST
    $achatFermeId = htmlspecialchars($_POST['fermeId']);
    $ciblePaysId =  htmlspecialchars($_POST['pays']);

    $accountsManager = new AccountsManager($db);
    $fermesManager = new FermesManager($db);
    $paysManager = new PaysManager($db);
    $usersFermesManager = new UsersFermesManager($db);

    /**
     * on vas de nouveau faire des verification d'usage pour eviter 
     * un souci potentiel en amont
     */

    // 0. déclaration variable gestion erreur et validation
    $errAchat = null;
    $succesAchat = null;

    // 1. verification si le joueur peut acheter cette ferme (GreenCion disponible)
    $user = $accountsManager->getAccount($_SESSION['id']);
    $infoFerme = $fermesManager->getFerme($achatFermeId);
    $pays = $paysManager->getPays($ciblePaysId);

    if($user->money() < $infoFerme->prix()){

        $errAchat = 'Il vous manque ' . ($infoFerme->prix() - $user->money());
        header('Location:../../../index.php?action=achatFerme&idAchat='.$achatFermeId.'&err='.$errAchat);

    }else{

        $newSoldeMoney = $user->money() - $infoFerme->prix();
        var_dump($newSoldeMoney);
    }

    // 2. verification si le joueur n'a pas déjà une exploitation dans ce pays
    // si aucune ferme alors verification que le niveau de la ferme sois bien de niveau 1
    // si il y a déjà un ferme dans ce paye alors verification que le niveau de la ferme sois de 1 strict
    
    // mise a jour de la bouse GC
    $accountsManager->updateMoney($_SESSION['id'], $newSoldeMoney);

    if($usersFermesManager->verifFermePays($_SESSION['id'], $ciblePaysId) === 0){
        // egale 0 donc aucune ferme dans ce pays
        
        // ajout de la nouvelle ferme
        $addUserFerme = new UsersFermes(['pays_id' => $ciblePaysId, 'user_id' => $_SESSION['id'], 'ferme_id' => $achatFermeId, 'niveau' => $infoFerme->niveau(), 'type_id' => $infoFerme->type_id()]);

        $usersFermesManager->addUserFerme($addUserFerme);

        $succesAchat = 'Félicitation pour l\'achat de la ferme ' . $infoFerme->nom() . ' en ' . $pays->nom();
        header('Location:../../../index.php?action=game&achatFerme=' . $succesAchat );
    }else{
        // egale 1 donc le joueur a déjà une exploitation verification que l'achat et bien de plus 1 niveau
        // récuperation de la ferme a update
        $getFerme = $usersFermesManager->getUsersFermePays($_SESSION['id'], $ciblePaysId);
        //verification avant modification niveau dois etre de -1 stricte
        if($infoFerme->niveau() - 1 === $getFerme->niveau());
        {
    
            $usersFermesManager->updateUserFerme($getFerme);
            $succesAchat = 'Félicitation pour l\'achat de la ferme ' . $infoFerme->nom() . ' en ' . $pays->nom();
            header('Location:../../../index.php?action=game&achatFerme=' . $succesAchat );
        }


    }
?>