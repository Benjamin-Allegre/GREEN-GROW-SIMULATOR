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

        $user = $accountsManager->getAccount($_SESSION['id']);
        $questsActive = $usersQuestsManager->getAllQuestsActive($_SESSION['id']);


        require_once('views/online/game.php');
    }
    function quest($db)
    {
        $usersQuestsManager = new UsersQuestsManager($db);

        $id = (int) $_GET['id'];

        echo $usersQuestsManager->getQuestContentById($id);
        exit;
    }
?>