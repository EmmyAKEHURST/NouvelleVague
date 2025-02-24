document.addEventListener("DOMContentLoaded", function() {
    let title = document.querySelector(".animated-title");
    
    // Découper chaque lettre et l'entourer d'un span
    title.innerHTML = title.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    // Appliquer l'animation avec Anime.js
    anime.timeline({ loop: false })
        .add({
            targets: ".title-container .letter",
            rotateY: [-90, 0],  // Rotation de -90° vers 0°
            opacity: [0, 1],   // Apparition progressive
            duration: 1800,
            delay: (el, i) => 55 * i // Délai progressif pour chaque lettre
        });
});
