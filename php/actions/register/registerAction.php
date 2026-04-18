<?php
    require_once('../../init.php');
    require_once __DIR__ . '../../../../models/autoload.php';

    $accountsManager = new AccountsManager($db);
    $usersQuestsManager = new UsersQuestsManager($db);

    // traitement formulaire
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    // gestion des erreurs

    $errUsername = null;
    $errPassword = null;

    // gestion validation

    $succesRegister = null;

    // verification Username unique
    $returnVerifUsername = $accountsManager->verifUsernameUnique($username);

    // si le pseudo est déjà utilisé alors retour register + err message cause pseudo déjà utilisé
    if($returnVerifUsername === false){
        $errUsername = 'Ce pseudo n\'est pas disponible.';
        header('location:../../../index.php?action=register&err='.$errUsername);
    }

    // hash password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // new User
    $user = new Accounts(['username' => $username, 'password' => $passwordHash, 'money' => 0, 'xp' => 0, 'level' => 0]);
    $accountsManager->addAccount($user);

    // new userQuests
    // récupération de l'user pour ajouter la quetes de départ
    $user = $accountsManager->getAccount($username);

    $userQuests = new UsersQuests(['userId' => $user->id(), 'questName' => '01.Bienvenue']);
    $usersQuestsManager->addUserQuest($userQuests);

    // envoyer a la page connexion suite a l'inscription
    $succesRegister = 'Félicitation votre compte a bien été créer, connecter vous pour commencer a jouer.';
    header('location:../../../index.php?action=login&val=' .$succesRegister);


?>