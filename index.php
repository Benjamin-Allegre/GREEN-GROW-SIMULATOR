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
            elseif($_GET['action'] === 'register')
            {
                register();
            }
            elseif($_GET['action'] === 'login')
            {
                login();
            }
        }
    }
    catch(Exception $e)
    {
        echo 'Erreur : ' . $e->getMessage();
    }

?>