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
    <h1>Connexion </h1>
    <?=validation_list_errors() ?>
    <div class="container">
        <form action="<?= base_url('/connexion') ?>" method="post" novalidate>

            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" value="<?= set_value('login') ?>" required>
            </div>

            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="motdepasse" name="motdepasse" value="<?= set_value('motdepasse') ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <?php if (isset($errors) && !empty($errors)) : ?>

        <div class="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php endif; ?>
        </form>
        </div>
    </div>
</div>
</body>
</html>