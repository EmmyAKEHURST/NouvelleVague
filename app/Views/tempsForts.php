<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <div class="info-container">
            <h2>Temps Forts</h2>
            <p>Envie de découvrir cette magnifique ville qu'est Getset-Sur-Mer ? Inscrivez-vous à un temps fort !</p>
        </div>

        <div class="tempsfort-container">
            <h2>Les temps forts à venir</h2>
            <p>Chaque semaine, Getset-Sur-Mer vous propose une sélection d'événements à ne pas manquer. Expositions, concerts, marchés... Il y en a pour tous les goûts !</p>

            <div class="tempsfort-box-container">
                <?php
                foreach($tempsforts as $tempsfort) :
                ?>
                    <div class="tempsfort-box">
                        <img src="<?= base_url('img/' . htmlspecialchars($tempsfort['img'])) ?>" style="max-width: 500px; max-height:300px" alt="Image">
                        <br>
                        <h4><?= htmlspecialchars($tempsfort['libelle']) ?></h4>
                        <p><?= htmlspecialchars($tempsfort['description']) ?>
                        <br><br>Du <?= htmlspecialchars($tempsfort['date_debut']) ?> au <?= htmlspecialchars($tempsfort['date_fin']) ?>
                        <br><br>Nombre de places restantes : <?= htmlspecialchars($tempsfort['participant_max']) ?>
                        <div class="bouton">
                            <form action="<?= site_url('/tempsFortsInscription') ?>" method="post">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($tempsfort['id']) ?>">
                                <input type="hidden" name="libelle" value="<?= htmlspecialchars($tempsfort['libelle']) ?>">
                                <button type="submit">S'inscrire...</button>
                            </form>
                        </div>

                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    </body>
</html>