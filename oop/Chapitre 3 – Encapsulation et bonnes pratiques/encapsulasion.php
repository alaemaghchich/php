<?php
class article{
    private $auter;
    private $titre;
    private $contenu;
    public function __construct($a, $t, $c){
        $this->auter = $a;
        $this->titre = $t;
        $this->contenu = $t;

    }
    public function afficher(){
        return "auter : {$this->auter} - titre : {$this->titre} - contenu : {$this->contenu}";
    }
    public function setAuter($a){
        if(strlen($a) > 3 && !empty($a)){
        $this->auter = $a;    
        }
    }
    public function getAuter(){
        return "auter : {$this->auter} <br>";
    }


    public function setTitre($t){
        if (!empty($t) && strlen($t) > 3){
            $this->titre = $t;
        }else{
            echo "invalid";
        }
    }
    public function getTitre(){
        return "titre : {$this->titre} <br>";
    }

    public function setContenu($c){
        if(!empty($c) && strlen($c) > 3){
            $this->contenu = $c;
        }
    }
    public function getContenu(){
        return "about : {$this->contenu}";
    }
    

}
$article = new article("someone" , "something" , "anything");
$article->setAuter("Antoine de Saint-Exupéry");
$article->setTitre("The Little Prince");
$article->setContenu("A little boy travels to different planets. He learns about people, friendship, and love.");
echo $article->getAuter();
echo $article->getTitre();
echo $article->getContenu();
//echo $article->afficher();
