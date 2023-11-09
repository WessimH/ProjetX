document.addEventListener("DOMContentLoaded", function () {
    // Obtenir l'heure actuelle
    const currentHour = new Date().getHours();

    // Choisir le thème en fonction de l'heure
    if (currentHour >= 18 || currentHour < 6) {
        // Il est 18h ou plus, ou il est moins de 6h, donc on utilise le thème sombre
        document.documentElement.setAttribute('data-theme', 'dark');

    } else {
        // Il est entre 6h et 18h, donc on utilise le thème clair
        document.documentElement.setAttribute('data-theme', 'light');
    }
});
