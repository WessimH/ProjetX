<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <script src="js/modeSelector.js" type="text/javascript"></script>
    <meta name="robots" content="noindex" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>On est en vacance on revien plus tard ! </h1>
<?php for ($i = 0; $i < 10; $i++) { // Supposons que vous voulez répéter l'opération 10 fois
    // Exécutez votre code ici

    sleep(5); // Attendre 5 secondes
    if ($i == 5) {
        header('Location: https://edusign.com/fr/');
    }
}
?>
</body>
</html>