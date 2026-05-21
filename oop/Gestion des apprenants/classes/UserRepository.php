<?php

require_once "User.php";

class UserRepository {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll(): array {

        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();

        $rows = $stmt->fetchAll();

        $users = [];

        foreach ($rows as $row) {
            $users[] = $this->hydrater($row);
        }

        return $users;
    }
    //converte any line in database to users object
    private function hydrater(array $row): User {

        $user = new User();

        $user->setId($row['id']);
        $user->setName($row['nom']);
        $user->setLname($row['prenom']);
        $user->setMail($row['email']);
        $user->setRole($row['role']);
        $user->setBornDate($row['date_naissance']);
        $user->setRegisteDate($row['date_inscription']);
        $user->setActif($row['actif']);

        return $user;
    }
}