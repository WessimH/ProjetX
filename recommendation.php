<?php

//structure de la base de données et classes
class Post
{
    public $id;
    public $titre;
    public $description;
    public $image;
    public $tags;
    public $upvotes;
    public $downvotes;
    public $dateCreation;
    public $commentaires;

    public function __construct($id, $titre, $description, $image, $tags)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->image = $image;
        $this->tags = $tags;
        $this->upvotes = 0;
        $this->downvotes = 0;
        $this->dateCreation = time();
        $this->commentaires = [];
    }

    public function likeRatio()
    {
        $timeElapsed = time() - $this->dateCreation;
        return $this->upvotes / $timeElapsed;
    }
}

class Utilisateur
{
    public $id;
    public $nom;
    public $prenom;
    public $upvotes;
    public $preferencesTags;

    public function __construct($id, $nom, $prenom)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->upvotes = [];
        $this->preferencesTags = [];
    }

    public function ajouterUpvote($postId)
    {
        array_push($this->upvotes, $postId);
    }
}

//fonctions de recommandation
function recommanderPostes($utilisateur, $postes)
{
    $recommandations = [];
    foreach ($postes as $poste) {
        $score = 0;
        foreach ($poste->tags as $tag) {
            if (in_array($tag, $utilisateur->preferencesTags)) {
                $score++;
            }
        }
        if ($score > 0) {
            array_push($recommandations, $poste);
        }
    }
    return $recommandations;
}
//machine learning :D
function recommanderPostesML($utilisateur, $postes)
{
    $recommandations = [];
    foreach ($postes as $poste) {
        $score = 0;
        foreach ($poste->tags as $tag) {
            if (in_array($tag, $utilisateur->preferencesTags)) {
                $score++;
            }
        }
        if ($score > 0) {
            array_push($recommandations, $poste);
        }
    }
    return $recommandations;
}

