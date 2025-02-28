<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tout les temps forts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Nombre de places max</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tempsForts as $tempsFort): ?>
            <tr>
                <td><?= esc($tempsFort->libelle) ?></td>
                <td><?= esc($tempsFort->description) ?></td>
                <td><?= esc($tempsFort->date_debut) ?></td>
                <td><?= esc($tempsFort->date_fin) ?></td>
                <td><?= esc($tempsFort->participant_max) ?></td>
                <td>
                    <a href="<?= base_url('/modifierTempsFort/'.$tempsFort->id) ?>" class="btn btn-warning">Modifier</a>
                    <a href="<?= base_url('/supprimerTempsFort/'.$tempsFort->id) ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
