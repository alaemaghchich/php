<?php
class database{
    private $dsn = "mysql:host=localhost; dbname=blogdb ; charset=utf8";
    private $username = "root";
    private $password = "";
    private $connect;
    public function getConnect(){
        $this->connect = null;
        try{
            $this->connect = new PDO($this->dsn , $this->username , $this->password , [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch(PDOException $e){
            "errore : " . $e->getMessage();
        }
        return $this->connect;
    }
}