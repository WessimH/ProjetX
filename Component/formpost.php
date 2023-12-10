<?php
require 'BDDREQUEST.php';
$tag = BDD_request("SELECT id_tag, description FROM tags");

// form to post a post with bootstrap
/*
 * @param $id_utilisateur
 * @param $titre
 * @param $description
 * @param $photo_poste
 * @param $id_tag
 */

?>
<form method="post" action="formpost.php">
<div class="form-group">
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="title">
</div>


<div class="form-group">
    <label for="exampleFormControlSelect1">select a categorie</label>

    <select class="form-control" id="exampleFormControlSelect1" name="categorie">
        <?php
        for ($i = 0; $i < count($tag); $i++) {

            ?>
            <option><?php echo $tag[$i]["description"]; ?></option>
            <?php
        }
        ?>
    </select>
</div>

<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" name="title">
<div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
</div>
<div class="form-group">
    <input type="file" class="form-control-file" id="exampleFormControlFile1"  required name="pic">
</div>
<button type='submit' class='btn btn-primary'>Submit</button>
</form>
<?php
$file = trim(sanitize_string($_FILES['pic']));
move_uploaded_file($_FILES['pic']['tmp_name'], 'userpics/'.$file);
$categorie = $_POST['categorie'];
$titre = $_POST['title'];
$description = $_POST['description'];
//get the path of the file
$id_utilisateur = $_COOKIE['id_utilisateur'];
$path = 'userpics/'.$file;
//get the id of the user
BDD_request("INSERT INTO poste (:id_utilisateur, :titre, :description, :photo_poste", array(':id_utilisateur' => $id_utilisateur, ':titre' => $titre, ':description' => $description, ':photo_poste' => $path));
$id_utilisateur = $_COOKIE['id_utilisateur'];

?>


