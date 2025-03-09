<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getcet-sur-Mer</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>

    <div class="info-container">
        <h2>Bienvenue !</h2>
        <p>Vous venez d’arriver dans notre belle ville ? Getcet-sur-Mer vous ouvre ses bras !</p>
    </div>
    
    <div class="tempsfort-container">
        <h2>Les temps forts à venir</h2>
        <p>Chaque semaine, Getcet-sur-Mer vous propose une sélection d’événements à ne pas manquer. Expositions, concerts, marchés… Il y en a pour tous les goûts !</p>
        <div class="tempsfort-items">
        <section>
            <div class="container">
                <div class="carousel">
                    <input type="radio" name="slides" checked="checked" id="slide-1">
                    <input type="radio" name="slides" id="slide-2">
                    <input type="radio" name="slides" id="slide-3">
                    <input type="radio" name="slides" id="slide-4">
                    <input type="radio" name="slides" id="slide-5">
                    <input type="radio" name="slides" id="slide-6">
                    
                    <ul class="carousel__slides">
                        <?php
                        if (!empty($tempsforts)):
                        ?>
                            <?php
                            foreach ($tempsforts as $tempsfort):
                            ?>
                                <li class="carousel__slide">
                                    <figure>
                                        <div> <!-- htmlspecialchars est utilisé pour éviter les failles XSS (injection de code malveillant), il remplace le echo-->
                                            <img src="<?= base_url('img/' . htmlspecialchars($tempsfort['img'])) ?>" style="max-width: 700px; max-height:400px" alt="Image"> 
                                        </div>
                                        <figcaption><?= htmlspecialchars($tempsfort['libelle']) ?>
                                            <span class="credit"><?= htmlspecialchars($tempsfort['description']) ?></span>
                                            <br>
                                            Du <?= htmlspecialchars($tempsfort['date_debut']) ?> au <?= htmlspecialchars($tempsfort['date_fin']) ?>
                                            <br>
                                            Nombres de places restantes : <?= htmlspecialchars($tempsfort['participant_max']) ?>
                                        </figcaption>
                                    </figure>
                                </li>
                            <?php
                            endforeach;
                            ?>
                        <?php
                        else:
                        ?>
                            <p>Aucun temps fort disponible.</p>
                        <?php
                        endif;
                        ?>
                    </ul>

                    <ul class="carousel__thumbnails">
                        <?php
                        if (!empty($tempsforts)):
                        ?>
                            <?php
                            foreach ($tempsforts as $clef => $tempsfort):
                            ?>
                                <li>
                                    <label for="slide-<?= $clef + 1 ?>">
                                        <img src="<?= base_url('img/' . htmlspecialchars($tempsfort['img'])) ?>" alt="">
                                    </label>
                                </li>
                            <?php
                            endforeach;
                            ?>
                        <?php 
                        else:
                        ?>
                            <p>Pas d'images disponibles.</p>
                        <?php
                        endif;
                        ?>
                    </ul>

                </div>
            </div>
        </section>
        </div>

        <div class="bouton">
            <?= anchor("/tempsForts", "Voir plus d'évènements...") ?>
        </div>
    </div>

</div>
</body>
</html>
