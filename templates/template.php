<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>GreenGrow Simulator</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Style -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>

        <header>

            <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
                <div class="container">

                    <!-- BRAND -->
                    <a class="navbar-brand fw-bold" href="index.php">
                        <img src="images/Logo-GreenGrow-Simulator.png" alt="Logo GreenGrow Simulator" width="250" height="150">
                    </a>

                    <!-- BURGER MOBILE -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGreenGrow">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- MENU -->
                    <div class="collapse navbar-collapse" id="navbarGreenGrow">

                        <!-- LEFT MENU -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Accueil</a>
                            </li>
                            <?php if (!isset($_SESSION['id'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="presentation.php">Présentation</a>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['id'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="games/immobilier.php">Immobilier</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="games/fournisseur.php">
                                        Fournisseur</a>
                                </li>

                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="faq.php">FAQ</a>
                            </li>

                        </ul>

                        <!-- RIGHT AUTH -->
                        <div class="d-flex align-items-center">
                            <?php if (isset($_SESSION['id'])): ?>

                                <span class="text-white me-3">
                                    👤 <?= htmlspecialchars($_SESSION['username']) ?>
                                </span>

                                <form method="POST" action="../modules/auth/AuthController.php" class="d-inline">
                                    <input type="hidden" name="action" value="logout">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Déconnexion
                                    </button>
                                </form>

                            <?php else: ?>

                                <a href="index.php?action=login" class="btn btn-light btn-sm me-2">
                                    Connexion
                                </a>

                                <a href="index.php?action=register" class="btn btn-warning btn-sm">
                                    Inscription
                                </a>

                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </nav>

        </header>

  <!-- Le corps -->
        <main class="container-fluid">
            <?= $content ?>
        </main>

        <footer class="bg-success text-white text-center py-4 mt-5">

            <div class="container">

                <h5 class="mb-2">🌱 GreenGrow Simulator</h5>

                <p class="mb-2 small">
                    Un jeu de gestion agricole évolutif — plante, cultive et développe ton empire.
                </p>

                <div class="mb-3">
                    <a href="index.php" class="text-white me-3 text-decoration-none">Accueil</a>
                    <a href="faq.php" class="text-white me-3 text-decoration-none">FAQ</a>
                    <a href="login.php" class="text-white text-decoration-none">Connexion</a>
                </div>

                <hr class="border-light opacity-25">

                <p class="mb-0 small">
                    GreenGrow Simulator © 2026 — Tous droits réservés
                </p>

            </div>

        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>