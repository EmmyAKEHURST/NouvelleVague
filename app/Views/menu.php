<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Mes Contacts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('css/menu.css'); ?>">
</head>
<body>
    
    <nav>
        <div class="wrapper">
            <div class="logo">
                <?= anchor('/', '<img src="' . base_url('/img/nouvellevague.png') . '" width="100px" alt="Logo">') ?>
            </div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li><?= anchor('#', 'Temps Forts') ?></li>
                <li><?= anchor('#', 'Mes Inscriptions') ?></li>
                <li>
                    <a href="#" class="desktop-item">Authentification</a>
                    <input type="checkbox" id="showDropAuth">
                    <label for="showDropAuth" class="mobile-item">Authentification</label>
                    <ul class="drop-menu">
                        <li><?= anchor('/pgInscription', 'Inscription') ?></li>
                        <li><?= anchor('/pgConnexion', 'Connexion') ?></li>
                    </ul>
                </li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>

</body>
</html>