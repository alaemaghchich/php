<?php
class user {
    private $conn;
    private $table = "user";

    public $id;
    public $name;
    public $mail;

    public function __construct($db){
     $this->conn = $db;
}
//create 
public function create(){
    $sql = "INSERT INTO {$this->table} (name, email) VALUES (:name, :mail)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute(['name' => $this->name, "mail" => $this->mail]);
}
//read
public function read(){
    $sql = "SELECT * FROM {$this->table}";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 
//update
public function update(){
    $sql  = "UPDATE {$this->table} SET name= :name, mail=:mail WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute(["name" => $this->name, "mail"=>$this->mail , "id"=>$this->id]);
}
//delete 
public function delete(){
    $sql= "DELETE FROM {$this->table} where id=:id";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute(["id" => $this->id]);
}
}