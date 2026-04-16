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

        // récupération de l'user
        $user = $accountsManager->getAccount($_SESSION['id']);

        require_once('views/online/game.php');
    }

?>