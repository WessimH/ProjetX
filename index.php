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

<?php  require 'Component/BDDREQUEST.php';
 //detect if user is connected
if ($_COOKIE['password'] == null && $_COOKIE['pseudo'] == null) {
    header('Location: login/signUp.php');
}
elseif ($_COOKIE['password'] != null && $_COOKIE['pseudo'] != null) {
    $pseudo = $_COOKIE['pseudo'];
    $password = $_COOKIE['password'];
    $user = BDD_request("SELECT * FROM utilisateurs WHERE pseudo=':pseudo' AND mot_de_passe=':password'", array(':pseudo' => $pseudo, ':password' => $password));
    if (empty($user)) {
        header('Location: login/signUp.php');
    }
    else {

        include "Component/postUser.php";
    }
}
//if the user is connected display the post
else {
    include "Component/postUser.php";
}
?>
