<?php
    $title = 'Inscription';
    $content_css = '';
    $content_js = '';
?>

<!-- démarre la temporisation de sortie. Tant qu'elle est enclenchée,
    aucune donnée, hormis les en-têtes, n'est envoyée au navigateur,
    mais temporairement mise en tampon. -->
<?php ob_start(); ?>

<div class="container mt-5" style="max-width: 500px;">

    <!-- TITRE -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">🌱 Créer ton compte</h1>
        <p class="text-muted">
            Rejoins GreenGrow Simulator et commence à construire ta ferme.
        </p>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <form method="POST" action="php/actions/register/registerAction.php">

                <input type="hidden" name="action" value="register">
                <?php if(isset($_GET['err'])){ ?>
                        <p class="text-danger text-center"><?= $_GET['err'] ?></p>
                <?php } ?>
                <!-- USERNAME -->
                <div class="mb-3">
                    <label class="form-label">Pseudo</label>
                    <input 
                        name="username" 
                        class="form-control" 
                        placeholder="Choisis ton pseudo"
                        required
                    >
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input 
                        name="password" 
                        type="password" 
                        class="form-control" 
                        placeholder="Crée ton mot de passe"
                        required
                    >
                </div>

                <!-- BUTTON -->
                <button class="btn btn-warning w-100">
                    🌱 Créer mon compte
                </button>

            </form>

        </div>
    </div>

    <!-- LOGIN LINK -->
    <div class="text-center mt-4">

        <p class="text-muted">
            Déjà une ferme ?
        </p>

        <a href="login.php" class="btn btn-outline-success">
            Se connecter
        </a>

    </div>

</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>