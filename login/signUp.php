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
<form method="post" action="signUp.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="text" class="form-control"  aria-describedby="emailHelp"
               placeholder="pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <small id="emailHelp" class="form-text text-muted"><a href="login.php">You have an account?</a></small>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $user = BDD_request("SELECT * FROM utilisateurs WHERE pseudo=':pseudo' AND mot_de_passe=':password'", array(':pseudo' => $pseudo, ':password' => $password));
    if (empty($user)) {
        BDD_request("INSERT INTO utilisateurs (pseudo, adresse_mail, mot_de_passe) VALUES (:pseudo, :mail, :password)", array(':pseudo' => $pseudo, ':mail' => $mail, ':password' => $password));
        header('Location: login.php');
    }
    else {
        echo "This pseudo is already taken";
    }
}
