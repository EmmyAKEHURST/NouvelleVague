<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un nouveau Temps Fort</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Créer un nouveau Temps Fort</h2>

        <!-- Affichage des messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        
        <?php if (isset($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire de création -->
        <form action="<?= base_url('/creerTempsFort') ?>" method="post">

            <div class="form-group">
                <label for="libelle">Titre</label>
                <input type="text" name="libelle" id="libelle" class="form-control" value="<?= set_value('libelle') ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required><?= set_value('description') ?></textarea>
            </div>

            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" name="date_debut" id="date_debut" class="form-control" value="<?= set_value('date_debut') ?>" required>
            </div>

            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" name="date_fin" id="date_fin" class="form-control" value="<?= set_value('date_fin') ?>" required>
            </div>

            <div class="form-group">
                <label for="participant_max">Nombre de places maximum</label>
                <input type="number" name="participant_max" id="participant_max" class="form-control" value="<?= set_value('participant_max') ?>" required>
            </div>

            <div class="form-group">
                <label for="img">Chemin de l'image (Mettre une image le dossier img et saisir juste le nom et l'extension)</label>
                <input type="text" name="img" id="img" class="form-control" value="<?= set_value('img') ?>">
            </div>
            

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
                </div>
</body>
</html>
