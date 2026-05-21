<?php
class User{
    //properties
    private int $id = 0;
    private string $name;
    private string $lastName;
    private string $mail;
    private string $role;
    private string $BornDate;
    private string $registeDate;
    private int $actif;

    //getter function
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getLname(){
        return $this->lastName;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getRole(){
        return $this->role;
    }
    public function getBornDate(){
        return $this->BornDate;
    }
    public function getRegisteDate(){
        return $this->registeDate;
    }
    public function getActif(){
        return $this->actif;
    }
    public function getAge(){
        $birth =new DateTime($this->BornDate);
        $today = new DateTime();
        return $today->diff($birth)->y;
    }
    public function getCompleteName(){
        return $this->name . " " . strtoupper($this->lastName);
    }
    public function getFirstChar(){
        return strtoupper($this->lastName[0]) . strtoupper($this->name[0]);
    }
    public function getOldest(){
        $register = new DateTime($this->registeDate);
        $today = new DateTime();
        return $today->diff($register)->days;
    }
    public function getIsActif(){
        return $this->actif === 1;
    }
    public function getStatuLabel(){
        return $this->getIsActif() ? 'actif' : 'inactif';
    }
    public function getStatuBadge(){
        return $this->getIsActif() ? "success" : "secondary"; 
    }
    public function getRoleLabel(){
        return match($this->role){
        'apprenant' => 'Apprenant',
        'formateur' => 'Formateur',
        'admin' => 'Admin',
        default => 'Inconnu'
        };
    }


    
    //setters function
    public function setId($id){
        $this->id =$id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setLname($Lname){
        $this->lastName = $Lname;
    }
    public function setMail($mail){
        if(!filter_var($mail , FILTER_VALIDATE_EMAIL)){
            throw new InvalidArgumentException("email invalide");
        }
        $this->mail = $mail;
    }
    public function setRole($role){
    $allowed = ['apprenant', 'formateur', 'admin'];
    if(!in_array($role, $allowed)){
        throw new InvalidArgumentException("Role invalide");
    }
    $this->role = $role;
    }
    public function setBornDate($BornDate){
        $date = DateTime::createFromFormat("Y-m-d" , $BornDate);
        if(!$date){
            throw new InvalidArgumentException("format date invalide");
        }
        $age = (new DateTime())->diff($date)->y;
        if($age < 16 || $age >60){
            throw new InvalidArgumentException("you are minor");
        }
        $this->BornDate = $BornDate;
    }
    public function setRegisteDate($date){
        $this->registeDate = $date;
    }

    public function setActif($actif){
        if ($actif !== 0 && $actif !== 1){
            throw new InvalidArgumentException("actif invalide");
        }
        $this->actif = $actif;
    } 
}