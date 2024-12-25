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
<form action="<?= base_url('Controleurmain/supprimervalider') ?>" method="post" novalidate>
        <div class="mb-3">
            <label for="numero" class="form-label">Numéro</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= set_value('numero') ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</body>
</html>