<?php
require 'Component/BDDREQUEST.php';
//get the data from the form
$email = $_POST['Email'];
$password = $_POST['Password'];
//sanitize input
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
//check if the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signUp.php?error=invalidEmail");
    exit();
}
//check if the email already exist
$sql = "SELECT * FROM utilisateurs WHERE adresse_mail = ':email'";
$result = BDD_request($sql , array(':email' => $email));
if ($result) {
    header("Location: signUp.php?error=emailAlreadyExist");
    exit();

}?>
    <img src="img/logo.png" alt="logo" id="logo">
    <form method="post" action="login.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <small id="emailHelp" class="form-text text-muted"><a href="signUp.php">You don't have an account?</a></small>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember me!</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
