<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>

    <?php
        $participant_max = $_POST['participant_max'] ?? '';
        $datedebut = $_POST['date_debut'] ?? '';
        $datefin = $_POST['date_fin'] ?? '';
        $libelle = $_POST['libelle'] ?? 'Événement inconnu';
        $id = $_POST['id'] ?? '';
        //var_dump($datedebut, $datefin);
    ?>
        <!-- Formulaire -->
        <h1> Inscription au temps fort " <?= htmlspecialchars($libelle) ?> " : </h1>
        <?=validation_list_errors() ?>
        <div class="container">
            <form action="<?= base_url('/inscriptionEnvoieTF') ?>" method="post">
                <div class="mb-3">
                    <label for="accompagnateurs" class="form-label">Nombre d'accompagnateurs</label>
                    <input type="number" class="form-control" id="accompagnateur" name="accompagnateur" value="<?= set_value('accompagnateur') ?>" required max="5">
                </div>

                <div class="mb-3">
                    <label for="motdepasse" class="form-label">Date souhaitée</label>
                    <input type="date" class="form-control" id="date" name="date" required min="<?= htmlspecialchars($datedebut) ?>" max="<?= htmlspecialchars($datefin) ?>">
                </div>

                <input type="hidden" name="idTempsFort" value="<?= htmlspecialchars($id) ?>">
                <input type="hidden" name="participant_max" value="<?= htmlspecialchars($participant_max) ?>">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
    </body>
</html>