<?php
class Article {
    protected $titre;
    protected $contenu;

    public function __construct($titre, $contenu) {
        $this->titre = $titre;
        $this->contenu = $contenu;
    }

    public function afficher() {
        return "Titre : " . $this->titre . " - Contenu : " . $this->contenu;
    }
}

class BlogArticle extends Article {
    private $auteur;

    public function __construct($titre, $contenu, $auteur) {
        parent::__construct($titre, $contenu);
        $this->auteur = $auteur;
    }

    public function afficher() {
        return parent::afficher() . " - Auteur : " . $this->auteur;
    }
}

$article = new BlogArticle("POO en PHP", "Découvrir l'héritage.", "Alice");
echo $article->afficher();
