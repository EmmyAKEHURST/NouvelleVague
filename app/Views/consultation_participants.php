<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation des Participants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <center><div class="container">
        <h1>Liste des participants aux temps forts</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Temps Fort</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                    <th>Accompagnateur</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($participants)): ?>
                    <tr>
                        <td colspan="6">Aucun participant inscrit.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($participants as $participant): ?>
                        <tr>
                            <td><?= esc($participant['libelle']) ?></td>
                            <td><?= esc($participant['nom']) ?></td>
                            <td><?= esc($participant['prenom']) ?></td>
                            <td><?= esc($participant['mail']) ?></td>
                            <td><?= esc($participant['date']) ?></td>
                            <td><?= $participant['accompagnateur'] > 0 ? esc($participant['accompagnateur']) : 'Aucun' ?></td>

                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table></center>
                    </div>
    </div>
</body>
</html>
