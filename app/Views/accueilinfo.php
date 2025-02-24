<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getcet-sur-Mer</title>
    <link rel="stylesheet" href="styles.css">
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
                            <li class="carousel__slide">
                                <figure>
                                    <div>
                                        <img src="https://picsum.photos/id/1041/800/450" alt="">
                                    </div>
                                    <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <span class="credit">Photo: Tim Marshall</span>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="carousel__slide">
                                <figure>
                                    <div>
                                        <img src="https://picsum.photos/id/1043/800/450" alt="">
                                    </div>
                                    <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <span class="credit">Photo: Christian Joudrey</span>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="carousel__slide">
                                <figure>
                                    <div>
                                        <img src="https://picsum.photos/id/1044/800/450" alt="">
                                    </div>
                                    <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <span class="credit">Photo: Steve Carter</span>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="carousel__slide">
                                <figure>
                                    <div>
                                        <img src="https://picsum.photos/id/1044/800/450" alt="">
                                    </div>
                                    <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <span class="credit">Photo: Steve Carter</span>
                                    </figcaption>
                                </figure>
                            </li>
                        </ul>
                        <ul class="carousel__thumbnails">
                            <li>
                                <label for="slide-1"><img src="https://picsum.photos/id/1041/150/150" alt=""></label>
                            </li>
                            <li>
                                <label for="slide-2"><img src="https://picsum.photos/id/1043/150/150" alt=""></label>
                            </li>
                            <li>
                                <label for="slide-3"><img src="https://picsum.photos/id/1044/150/150" alt=""></label>
                            </li>
                            <li>
                                <label for="slide-4"><img src="https://picsum.photos/id/1044/150/150" alt=""></label>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="bouton">
            Voir plus d'événements...
        </div>
    </div>
</div>
</body>
</html>
