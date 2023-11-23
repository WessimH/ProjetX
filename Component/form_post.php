<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form_post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>FORMULAIRE POST</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  <div class="card">
      <div class="input-group">
          <textarea class="form-control" aria-label="With textarea"></textarea>
      </div>
      <form method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="d" value="--><?php echo htmlentities($d) ?><!--">
          <input type="button" class="bouton">
          <input type="hidden" name="d" value="<?php echo htmlentities($d) ?>">
          <button <img src="ProjetX/img/uploadphoto" > </button>
          <input type="image" src="img/uploadphoto.png" alt="ajouter un GIF" width="48" height="48">
          <input type="hidden" name="d" value="<?php echo htmlentities($d) ?>">
          <button <img src="ProjetX/img/uploadphoto" > </button>
          <input type="image" src="img/uploadphoto.png" alt="ajouter un emoji" width="48" height="48">
      </form>
      <button type="button" class="btn btn-primary">Envoyer</button>
  </div>
</html>


<!--css :-->
<!--.bouton{-->
<!--background-image : URL_IMAGE;-->
<!--}-->
