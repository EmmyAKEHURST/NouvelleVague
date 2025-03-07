<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>  
    <?php // Message de succès après modification du profil
    if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('success')) :?>
        <div class="alert alert-danger"><?= session()->getFlashdata('danger') ?></div>
    <?php endif; ?>

        <div class="info-container" id="no">
            <h2>Bienvenue, <?= esc($user->prenom) ?> <?= esc($user->nom) ?></h2>
            <p>Ici, tu as accès aux informations de ton compte, tu peux également les modifier si nécéssaire !</p>
            <br>
            <br>
            <p><strong>Nom:</strong> <?= esc($user->nom) ?></p>
            <p><strong>Prénom:</strong> <?= esc($user->prenom) ?></p>
            <p><strong>Login:</strong> <?= esc($user->login) ?></p>
            <p><strong>Email:</strong> <?= esc($user->mail) ?></p>
            <p><strong>Mot de passe:</strong>***</p>
            <br>
            <div class="bouton">
                <?= anchor('/profilModifier', 'Modifier les informations')?>
            </div>
        </div>
    </div>

</body>
</html>
