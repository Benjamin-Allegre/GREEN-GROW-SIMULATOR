<?php
    session_start();

    require_once('php/init.php');
    require_once('controller/controller.php');

    try
    {
        if(empty($_GET))
        {
            accueil();
        }
        elseif(isset($_GET['action']))
        {
            if($_GET['action'] === 'accueil')
            {
                accueil();
            }
            elseif($_GET['action'] === 'presentation'){
                presentation();
            }
            elseif($_GET['action'] === 'register')
            {
                register();
            }
            elseif($_GET['action'] === 'login')
            {
                login();
            }
            elseif($_GET['action'] === 'logout')
            {
                logout();
            }
            elseif($_GET['action'] === 'game')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    game($db);
                }
            }
            elseif($_GET['action'] === 'immobilier')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    immobilier($db);
                }
            }
            elseif($_GET['action'] === 'achatFerme')
            {
                if(empty($_SESSION['username'])){
                    accueil();
                }else{
                    $idFerme = $_GET['idAchat'];
                    achatFerme($db, $idFerme);
                }
            }
            elseif($_GET['action'] === 'fournisseurs')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    fournisseurs($db);
                }
            }
             elseif($_GET['action'] === 'allFermesExt')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    allFermesExt($db);
                }
            }
            elseif($_GET['action'] === 'bureauFermeExt')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    bureauFermeExt($db);
                }
            }
            elseif($_GET['action'] === 'allFermesInt')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    allFermesInt($db);
                }
            }
            elseif($_GET['action'] === 'allFermesHydro')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    allFermesHydro($db);
                }
            }
            elseif($_GET['action'] === 'allFermesAero')
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    allFermesAero($db);
                }
            }
            elseif($_GET['action'] === 'quest') // ✅ AJOUT IMPORTANT
            {
                if(empty($_SESSION['username'])){
					accueil();
				}else{
                    quest($db);
                }
            }
            elseif($_GET['action'] === 'saveMarque')
            {
                saveMarque($db);
            }
        }
    }
    catch(Exception $e)
    {
        echo 'Erreur : ' . $e->getMessage();
    }

?>