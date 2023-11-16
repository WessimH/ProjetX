<?php
function BDD_request($request) //fonction qui permet de faire des requetes à la base de donnée
{
    $db = new PDO('mysql:host=localhost;dbname=wessim;charset=utf8', 'root',''); //connexion à la base de donnée
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->prepare($request); //préparation de la requete
    //$req->execute();
    //on détecte le mot select dans la requete
    if (preg_match("/SELECT/i", $request)) {    //si on a un select
        return $req->fetchAll(PDO::FETCH_ASSOC); //on retourne un tableau associatif
    } else {
        return $req->execute(); //sinon on retourne un booléen
    }
}