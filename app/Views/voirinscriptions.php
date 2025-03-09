<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos inscriptions</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"> <!-- Ajoute ton CSS si nécessaire -->
</head>
<body>

    <?php // Message de succès ou d'erreur après une action
        if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php elseif (session()->getFlashdata('danger')): ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('danger')) ?></div>
        <?php endif; 
    ?>

    <div class="info-container" id="no">
        <h2>Vos inscriptions</h2>
        <p>Ici, vous pouvez consulter les temps-forts auxquels vous êtes inscrit. Vous pouvez également vous désinscrire.</p>
    </div>
    <br>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Libelle du temps fort</th>
                <th>date</th>
                <th>Accompagnateur.s</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($inscriptions)):
            ?>
                <?php
                foreach ($inscriptions as $inscription):
                ?>
                    <tr>
                        <td><?= esc($inscription['libelle']) ?></td>
                        <td><?= esc($inscription['date']) ?></td>
                        <td><?= esc($inscription['accompagnateur']) ?></td>
                        <td>
                            <form action="<?= site_url('/desinscriptionTempsFort') ?>" method="post">
                                <input type="hidden" name="id_utilisateur" value="<?= esc($inscription['id_utilisateur']) ?>">
                                <input type="hidden" name="id_temps_fort" value="<?= esc($inscription['id_temps_fort']) ?>">
                                <input type="hidden" name="date" value="<?= esc($inscription['date']) ?>">
                                <input type="hidden" name="accompagnateur" value="<?= esc($inscription['accompagnateur']) ?>">
                                <button type="submit" class="btn btn-danger">Se désinscrire</button>
                            </form>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            <?php
            else:
            ?>
                <tr>
                    <td colspan="4">Vous n'êtes inscrit à aucun temps fort.</td>
                </tr>
            <?php
            endif;
            ?>
    </table>
</div>
</body>
</html>
