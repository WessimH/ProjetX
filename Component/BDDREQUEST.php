<?php
function BDD_request($request)
{
    $db = new PDO('mysql:host=localhost;dbname=wessim;charset=utf8', 'root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->prepare($request);
    //$req->execute();
    //on détecte le mot select dans la requete
    if (preg_match("/SELECT/i", $request)) {
        return $req->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return $req->execute();
    }
}