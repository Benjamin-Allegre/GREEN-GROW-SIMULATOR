<?php
    $title = 'Connexion';
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
        <h1 class="fw-bold">🔐 Connexion</h1>
        <p class="text-muted">
            Accède à ta ferme et continue ton évolution dans GreenGrow Simulator
        </p>
    </div>

    <!-- CARD FORM -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <?php if(isset($_GET['val'])){ ?>
                        <p class="text-success text-center"><?= $_GET['val'] ?></p>
                <?php } ?>
            <form method="POST" action="../modules/auth/AuthController.php">

                <input type="hidden" name="action" value="login">
                <?php if(isset($_GET['err'])){ ?>
                        <p class="text-danger text-center"><?= $_GET['err'] ?></p>
                <?php } ?>
                <!-- USERNAME -->
                <div class="mb-3">
                    <label class="form-label">Pseudo</label>
                    <input 
                        name="username" 
                        class="form-control" 
                        placeholder="Entre ton pseudo"
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
                        placeholder="Entre ton mot de passe"
                        required
                    >
                </div>

                <!-- BUTTON -->
                <button class="btn btn-success w-100">
                    🌱 Se connecter
                </button>

            </form>

        </div>
    </div>

    <!-- INFOS -->
    <div class="text-center mt-4">

        <p class="text-muted">
            Pas encore de ferme ?
        </p>

        <a href="register.php" class="btn btn-outline-success">
            Créer un compte
        </a>

    </div>

</div>

<!-- Lit le contenu courant du tampon de sortie puis l'efface -->
<?php $content = ob_get_clean(); ?>

<!-- require (template générale site) -->
<?php require_once('templates/template.php'); ?>