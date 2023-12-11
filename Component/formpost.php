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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pic'])) {
// Ensure that the form is encoded as multipart/form-data
if ($_FILES['pic']['error'] === UPLOAD_ERR_OK) {
// Validate the file is an image
$check = getimagesize($_FILES['pic']['tmp_name']);
if($check !== false) {
// Sanitize the file name and determine the path
$file = sanitize_file_name($_FILES['pic']['name']);
$path = 'userpics/' . $file;

// Attempt to move the uploaded file to its new location
if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
// Sanitize the other fields
$categorie = filter_var($_POST['categorie'], FILTER_SANITIZE_STRING);
$titre = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
$id_utilisateur = $_COOKIE['id_utilisateur']; // Ensure this cookie is set and sanitized

// Execute the database query safely
$params = [
':id_utilisateur' => $id_utilisateur,
':titre' => $titre,
':description' => $description,
':photo_poste' => $path
];
BDD_request("INSERT INTO poste (id_utilisateur, titre, description, photo_poste) VALUES (:id_utilisateur, :titre, :description, :photo_poste)", $params);
} else {
echo "File could not be uploaded.";
}
} else {
echo "Uploaded file is not a valid image.";
}
} else {
echo "File upload error: " . $_FILES['pic']['error'];
}
}

// Function to sanitize file names (can be expanded as needed)
function sanitize_file_name($filename) {
return preg_replace('/[^A-Za-z0-9\._-]/', '', $filename);
}
?>

