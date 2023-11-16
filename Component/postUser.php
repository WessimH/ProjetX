<?PHP require_once('BDDREQUEST.php');

$Post = BDD_request("SELECT id FROM poste");
var_dump($Post);
for ($i = 0; $i < count($Post); $i++) {
    $post_content = BDD_request("SELECT (id_utilisateur,description,date,photo_poste) FROM poste WHERE id = " . $i); //on récupère le contenu du post

    //$user_name = BDD_request("SELECT nom FROM utilisateur WHERE id = " . $user_id); on récupère le nom de l'utilisateur qui a posté
    $description = BDD_request("SELECT description FROM poste WHERE id = " . $i); //on récupère la description du post
    var_dump($post_content);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <h5 class="mt-0"><?PHP echo $user_name; ?></h5>
                    <?PHP echo $description; ?>
                </div>
            </div>
            <button class="btn btn-primary"><a href="#" class="card-link">Comment</a> <!--lien ouvre les commentaires de commentaire-->
            </button>
            <button class="btn btn-primary"><a href="#" class="card-link"><img src="img/upvote-svgrepo-com.svg"
                                                                               alt="upvote" style="height: 2vh"></a> <!-- like-->
            </button>

            <small class="text-muted" style="text-align: left; justify-content: left">Last posted mins ago</small></p>
            <input type="hidden" value="<?php echo BDD_request("") ?>">
        </div>
    </div>
    <?php
}
?>

