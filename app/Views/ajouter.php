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
<?=validation_list_errors() ?>
<form action="<?= base_url('Controleurmain/ajoutervalider') ?>" method="post" novalidate>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= set_value('nom') ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= set_value('prenom') ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="numero" class="form-label">Numéro de téléphone</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= set_value('numero') ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="commentaire" class="form-label">Commentaire (facultatif)</label>
            <textarea class="form-control" id="commentaire" name="commentaire"><?= set_value('commentaire') ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</body>
</html>