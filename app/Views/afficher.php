<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des contacts</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Téléphone</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contacts)): ?>
                    <?php foreach ($contacts as $unContact): ?>
                        <tr>
                            <td><?= esc($unContact['idContact']) ?></td>
                            <td><?= esc($unContact['numeroContact']) ?></td>
                            <td><?= esc($unContact['nomContact']) ?></td>
                            <td><?= esc($unContact['prenomContact']) ?></td>
                            <td><?= esc($unContact['emailContact']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Aucun contact trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>