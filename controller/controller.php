<?php
    require_once('models/autoload.php');
    

    function accueil()
    {
        require_once('views/offline/accueil.php');
    }
    function presentation()
    {
        require_once('views/offline/presentation.php');
    }
    function register()
    {
        require_once('views/offline/register.php');
    }

    function login()
    {
        require_once('views/offline/login.php');
    }

    function logout(){
        session_start();
        session_destroy();

        header("Location: index.php");
        exit;
    }

    function game($db)
    {
        $accountsManager = new AccountsManager($db);
        $usersQuestsManager = new UsersQuestsManager($db);
        $usersSuccessManager = new UsersSuccessManager($db);
        $usersFermesManager = new UsersFermesManager($db);
        $paysManager = new PaysManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);
        $questsActive = $usersQuestsManager->getAllQuestsActive($_SESSION['id']);
        $successActive = $usersSuccessManager->getAllSuccessActive($_SESSION['id']);

        // ferme INT EXT HYDRO AERO
        $userFermesExt = $usersFermesManager->getUserFermesExt($_SESSION['id']);
        $userFermesInt = $usersFermesManager->getUserFermesInt($_SESSION['id']);
        $userFermesHydro = $usersFermesManager->getUserFermesHydro($_SESSION['id']);
        $userFermesAero = $usersFermesManager->getUserFermesAero($_SESSION['id']);

        require_once('views/online/game.php');
    }
    function immobilier($db)
    {
        $accountsManager = new AccountsManager($db);
        $fermesManager = new FermesManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);
        $fermes = $fermesManager->getAllFerme();

        require_once('views/online/immobilier.php');
    }
    function achatFerme($db, $idFerme)
    {
        $accountsManager = new AccountsManager($db);
        $fermesManager = new FermesManager($db);
        $paysManager = new PaysManager($db);
        $usersFermesManager = new UsersFermesManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);
        $ferme = $fermesManager->getFerme($idFerme);
        $pays = $paysManager->getAllPays();
        $paysDisponibles = [];
        foreach($pays as $p): 

            $maxNiveau = $usersFermesManager->getMaxNiveauByPays(
                $user->id(), 
                $p->id(), 
                $ferme->type_id()
            );

            // 👉 CAS NIVEAU 1
            if ($ferme->niveau() == 1) {
                if ($maxNiveau == null) {
                    $paysDisponibles[] = $p;
                }
            }

            // 👉 CAS NIVEAU 2+
            else {
                if ($maxNiveau == $ferme->niveau() - 1) {
                    $paysDisponibles[] = $p;
                }
            }

        endforeach;

        require_once('views/online/achatFerme.php');
    }
    function fournisseurs($db)
    {
        $accountsManager = new AccountsManager($db);
        $grainesExtManager = new GraineExtManager($db); 
        // $grainesIntManager = new GraineIntManager($db); 
        // $grainesHydroManager = new GraineHydroManager($db); 
        // $grainesAeroManager = new GraineAeroManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);
        // toutes les graines du jeu achetable 
        $grainesExt = $grainesExtManager->getAll();
        // $grainesInt = $grainesIntManager->getAll();
        // $grainesHydro = $grainesHydroManager->getAll();
        // $grainesAero = $grainesAeroManager->getAll();

        require_once('views/online/fournisseurs.php');
    }
    function allfermesExt($db)
    {
        $accountsManager = new AccountsManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);

        require_once('views/online/allFermesExt.php');
    }
    function allfermesInt($db)
    {
        $accountsManager = new AccountsManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);
        require_once('views/online/allFermesInt.php');
    }
    function allfermesHydro($db)
    {
        $accountsManager = new AccountsManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);

        require_once('views/online/allFermesHydro.php');
    }
    function allfermesAero($db)
    {
        $accountsManager = new AccountsManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);
        
        require_once('views/online/allFermesAero.php');
    }
    function fabriques($db){
        
    }
    function quest($db)
    {
        $accountsManager = new AccountsManager($db);
        $usersQuestsManager = new UsersQuestsManager($db);

        $user = $accountsManager->getAccount($_SESSION['id']);
        
        $id = (int) $_GET['id'];

        echo $usersQuestsManager->getQuestContentById($id, $user);
        exit;
    }
    function saveMarque($db)
    {
        $accountsManager = new AccountsManager($db);

        $userId = $_SESSION['id'];
        $marque = trim($_POST['marque']);

        if (empty($marque)) {
            echo "Nom invalide";
            exit;
        }

        // vérifie si existe déjà
        if ($accountsManager->marqueExists($marque)) {
            echo "Cette marque existe déjà";
            exit;
        }

        // update user
        $accountsManager->updateMarque($userId, $marque);

        echo "OK";
        exit;
    }
?>