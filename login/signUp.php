<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';*/
require __DIR__ . '/../Component/BDDREQUEST.php';
// Avant de travailler avec les données $_POST, vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Si le formulaire a été soumis, alors vous pouvez accéder en toute sécurité à $_POST['Pseudo'], etc.
$pseudo = isset($_POST['Pseudo']) ? $_POST['Pseudo'] : '';
$email = isset($_POST['Email']) ? $_POST['Email'] : '';
$password = isset($_POST['Password']) ? $_POST['Password'] : '';

// Assurez-vous de valider et de nettoyer les données ici
$pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = filter_var($password, FILTER_SANITIZE_STRING);

$HashedPassword = password_hash($password, PASSWORD_DEFAULT);
require '../Component/BDDREQUEST.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Assurez-vous que les variables POST existent avant d'y accéder
$pseudo = isset($_POST['Pseudo']) ? $_POST['Pseudo'] : null;
$email = isset($_POST['Email']) ? $_POST['Email'] : null;
$password = isset($_POST['Password']) ? $_POST['Password'] : null;

if ($pseudo && $email && $password) {
    // Ici, vous pouvez continuer à traiter les données du formulaire
    $HashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //check if email already exist
    if(BDD_request("SELECT * FROM `utilisateurs` WHERE `adresse_mail` = ':email'", array(':email' => $email)) or BDD_request("SELECT * FROM `utilisateurs` WHERE `pseudo` = ':pseudo'", array(':pseudo' => $pseudo))){
        echo "email or pseudo already exist";

    }
    else{
        //create account
        BDD_request("INSERT INTO `utilisateurs` (`pseudo`, `adresse_mail`, `mot_de_passe`) VALUES (':pseudo', ':email', ':password')", array(':pseudo' => $pseudo, ':email' => $email, ':password' => $HashedPassword));
        header('Location: login.php');
        exit();
    }
    // Reste du code pour insérer les données dans la base de données
} else {
    echo "error";

};
}
}
?>

<div class="container">
    <h2>Sign Up</h2>
    <form id="signupForm" method="post" action="login.php" novalidate>
        <div class="form-group">
            <label for="Pseudo">Pseudo</label>
            <input type="text" maxlength="10" class="form-control" id="Pseudo" name="Pseudo" placeholder="Pseudo"
                   required>
        </div>
        <div class="form-group">
            <label for="Email">Email address</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="ConfirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password" required>
            <div class="invalid-feedback">
                Passwords do not match.
            </div>
        </div>
        <small id="loginHelp" class="form-text text-muted">
            <a href="login.php">You have an account? Login here.</a>
        </small>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.getElementById('signupForm').addEventListener('submit', function (event) {
        var password = document.getElementById('Password');
        var confirmPassword = document.getElementById('ConfirmPassword');

        // Check if passwords match
        if (password.value !== confirmPassword.value) {
            // Prevent form from submitting
            event.preventDefault();

            // Show error message and add Bootstrap validation classes
            confirmPassword.classList.add('is-invalid');
            password.classList.add('is-invalid');
        } else {
            // Clear any previous invalid state
            confirmPassword.classList.remove('is-invalid');
            password.classList.remove('is-invalid');

            // Proceed with form submission

        }
    });
</script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

