<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <script src="js/modeSelector.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php //comment poster un post?>
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php // Voici un exemple de poste
?>

<div class="row">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <img src="img/logo.png"">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">Bouton à Gauche</button>
                    <!-- Ce div vide sert d'espaceur entre les boutons -->
                    <div class="flex-grow-1"></div>
                    <button class="btn btn-secondary">Bouton à Droite</button>
                </div>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>
