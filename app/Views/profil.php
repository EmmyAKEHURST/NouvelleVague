<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Mon Profil</h2>

    
    <?php // Message de succès après modification du profil
    if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/profil/modifier') ?>" method="post">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="<?= esc($user->nom) ?>" required>
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="<?= esc($user->prenom) ?>" required>
        </div>
        <div class="form-group">
            <label>Login</label>
            <input type="text" name="login" class="form-control" value="<?= esc($user->login) ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="mail" class="form-control" value="<?= esc($user->mail) ?>" required>
        </div>
        <div class="form-group">
            <label>Nouveau mot de passe (laisser vide pour ne pas modifier)</label>
            <input type="password" name="motdepasse" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    </div>
</div>

</body>
</html>
