<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <script src="js/modeSelector.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<?PHP
include "formpost.php";
$post_request = BDD_request("SELECT utilisateurs.pseudo,
       poste.titre, poste.date,
       poste.photo_poste,
       poste.description,
       utilisateurs.id_utilisateur
FROM poste INNER JOIN utilisateurs 
    ON poste.id_utilisateur = utilisateurs.id_utilisateur;");

if ($post_request == null) {
    echo "Aucun post n'a été trouvé";
} else {

    for ($i = 0; $i < count($post_request); $i++) {
        //on itère sur les id des posts



        if (empty($post_request)) {
            // Gérer le cas où aucun résultat n'est retourné
            echo "Aucun post n'a été trouvé";
            exit();
        }

        ?>

        <div class="row">

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post_request[$i]["pseudo"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"> <?php echo $post_request[$i]["titre"]; ?></h6>
                        <p class="card-text"><?php echo $post_request[$i]["description"]; ?></p>
                        <img src="<?php echo $post_request[$i]["photo_poste"]; ?>" alt="Photo poste">
                        <div class="d-flex justify-content-between">

                            <input type="text" name="comment" placeholder="Comment">
                            <button class="btn btn-primary">Comment</button>
                            <form action="postUser.php" method="post">
                                <script>
                                    function like() {
                                        document.getElementById("like").submit();
                                    }
                                </script>
                                <div class="flex-grow-1"></div>

                                <script>
                                    document.getElementById('likeButton').addEventListener('click', function () {
                                        // Changer la couleur de fond
                                        document.getElementById('heartIcon').addEventListener('click', function () {
                                            // Changer la couleur du SVG
                                            this.style.fill = 'red';
                                            this.style.stroke = 'red';
                                        });

                                        // Envoyer une requête AJAX
                                        $.ajax({
                                            url: 'postUser.php', // Remplacez par l'URL de votre script PHP
                                            type: 'post',
                                            data: {'action': 'like'}, // Envoyez les données nécessaires
                                            success: function (response) {
                                                // Gérez la réponse ici, si nécessaire
                                                console.log(response);
                                            },
                                            error: function (xhr, status, error) {
                                                // Gérez les erreurs ici
                                                console.error(error);
                                            }
                                        });
                                    });
                                </script>
                                <button id="likeButton" style="border: none; background-color: rgba(123,102,202,0)"
                                        name="clic">
                                    <svg id="heartIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-heart">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </button>
                                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'like') {
                                    //BDD_request("INSERT INTO userlikes (id_poste, id_utilisateur) VALUES ($id_poste)");
                                    // TODO : detecter l'utilisateur connecté
                                } ?>
                                <script></script>
                            </form>
                        </div>
                        <p class="card-text"><small class="text-muted"><?php echo $post_request[$i]['date']; ?></small></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

//switch case to see if values are null or not in the array
?>

