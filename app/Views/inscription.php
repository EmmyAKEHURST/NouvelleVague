<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<!-- Formulaire -->
 <h1> Inscription : </h1>
<?=validation_list_errors() ?>
<div class="container">
    <form action="<?= base_url('/inscription') ?>" method="post" novalidate>
        <div class="mb-3">
            <label for="nom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= set_value('prenom') ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= set_value('nom') ?>" required>
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login" value="<?= set_value('login') ?>" required>
        </div>

        <div class="mb-3">
            <label for="mail" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="mail" name="mail" value="<?= set_value('mail') ?>" required>
        </div>

        <div class="mb-3">
            <label for="motdepasse" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="motdepasse" name="motdepasse" value="<?= set_value('motdepasse') ?>" required>
        </div>

        <div class="mb-3">
            <label for="motdepasse" class="form-label">Valider votre mot de passe</label>
            <input type="password" class="form-control" id="validermotdepasse" name="validermotdepasse" value="<?= set_value('validermotdepasse') ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
</div>
</body>
</html>