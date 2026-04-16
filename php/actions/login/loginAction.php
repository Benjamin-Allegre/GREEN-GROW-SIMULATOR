<?php
    require_once('../../init.php');
    require_once __DIR__ . '../../../../models/autoload.php';

    $accountsManager = new AccountsManager($db);
    
    // traitement formulaire
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // gestion des erreurs

    $errLogin = null;

    // gestion validation

    $succesLogin = null;

    // verification Username unique
    $returnVerifUsername = $accountsManager->verifUsernameUnique($username);

    // si le pseudo est present alors on récupere l'user complet pour verifier le password
    if($returnVerifUsername === false){
        
        // récupération l'user complet
        $user = $accountsManager->getAccount($username);
        // verification du password

        if(password_verify($password, $user->password())){
            // toute les information sont exacte alors on vas valider la connexion
            session_start();
            
            $succesLogin = 'Bonjour '. $user->username();

            $_SESSION['id'] = $user->id();
            $_SESSION['username'] = $user->username();

            header('Location:../../../index.php?action=game&val='. $succesLogin);
        }else{
            $errLogin = 'Il semble que le mot de passe n\'est pas correct.';
            header('Location:../../../index.php?action=login&err='.$errLogin); 
        }
        
    }else{
        $errLogin = 'Ce pseudo n\'existe pas.';
        header('Location:../../../index.php?action=login&err='.$errLogin);
    }
?>