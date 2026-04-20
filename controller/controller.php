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

        $user = $accountsManager->getAccount($_SESSION['id']);
        $questsActive = $usersQuestsManager->getAllQuestsActive($_SESSION['id']);
        $successActive = $usersSuccessManager->getAllSuccessActive($_SESSION['id']);

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
        $usersFermes = $usersFermesManager->getAllUsersFermes($_SESSION['id']);
        var_dump($usersFermes);

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
    function fermes($db)
    {

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