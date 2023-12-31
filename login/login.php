<?php

//la fonction ne s'importe pas donc je l'ai copié collé

function BDD_request($request, $parameters = [], $AffectedRows = false)
{
    try {
        // Ensure the request is not empty
        if (empty($request)) {
            throw new ValueError("The SQL query cannot be empty.");
        }

        // Your database connection code here
        $db = new PDO('mysql:host=localhost;dbname=phpsite;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $db->prepare($request);

        // Execute the query with parameters if any
        $req->execute($parameters);

        // Handling the results based on the type of query
        if (preg_match("/SELECT/i", $request)) {
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } elseif ($AffectedRows == true) {
            return $req->rowCount();
        }


    } catch (PDOException $e) {

        return error_log($e->getMessage());
    } catch (ValueError $e) {
        return error_log($e->getMessage());
    }
    return null;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Récupérez les données du formulaire
    $mail = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

// Vérifiez si l'email et le mot de passe ont été fournis
    if (empty($mail) || empty($password)) {
        echo "Veuillez remplir tous les champs.";
    } else {
// Effectuez la vérification des identifiants ici
        $user = BDD_request("SELECT * FROM utilisateurs WHERE adresse_mail=:email AND mot_de_passe=:password", [':email' => $mail, ':password' => $password]);

        if ($user) {
// Les identifiants sont corrects
// Mettez en place le mécanisme de session ou de cookie ici
            setcookie('username', $user['username'], time() + 3600); // Exemple de création de cookie

// Redirigez vers la page d'affichage des posts
            header('Location: ../Component/postUser.php');
            echo "<a href='../Component/formpost.php'><a>";
            exit();
        } else {
// Les identifiants sont incorrects.
            echo "Informations de connexion incorrectes.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="login.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="email" name="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
               name="password">
        <small id="emailHelp" class="form-text text-muted"><a href="signUp.php">You don't have an
                account?</a></small>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="RememberMe">
        <label class="form-check-label" for="exampleCheck1">Remember me!</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
