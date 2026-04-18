<?php
    require_once('models/autoload.php');
    

    function accueil()
    {
        require_once('views/offline/accueil.php');
    }

    function register()
    {
        require_once('views/offline/register.php');
    }

    function login()
    {
        require_once('views/offline/login.php');
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