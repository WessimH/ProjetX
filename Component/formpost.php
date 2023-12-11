<?php
require 'BDDREQUEST.php';
$tag = BDD_request("SELECT id_tag, description FROM tags");



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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming sanitize_string() is your custom function, make sure to define it before using it.
    // For example, you could replace it with a simple string replacement function, like this:
    function sanitize_file_name($filename) {
        // Remove any characters that are not letters, numbers, dots, or hyphens
        return preg_replace('/[^A-Za-z0-9\._-]/', '', $filename);
    }

    $file = sanitize_file_name($_FILES['pic']['name']);
    if (move_uploaded_file($_FILES['pic']['tmp_name'], 'userpics/' . $file)) {
        $categorie = $_POST['categorie'];
        $titre = $_POST['title'];
        $description = $_POST['description'];
        $id_utilisateur = $_COOKIE['id_utilisateur'];
        $path = 'userpics/' . $file;

        BDD_request("INSERT INTO poste (id_utilisateur, titre, description, photo_poste) VALUES (:id_utilisateur, :titre, :description, :photo_poste)", array(':id_utilisateur' => $id_utilisateur, ':titre' => $titre, ':description' => $description, ':photo_poste' => $path));
    } else {
        // Handle error when file upload fails
        echo "error";
    }
}

?>


