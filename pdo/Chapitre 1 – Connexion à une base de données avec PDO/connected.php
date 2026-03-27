<?php
$host = 'localhost';
$dbname = 'blogdb';
$username = 'root';
$password = '';
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base $dbname";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
/*$pdo = new PDO  (dsn , user , password  , options
DSN = Data Source Name like : oracle; sqlserver; mysql; postgre...
example sqlserver = "sqlsrv:Server=localhost;Database=mydb"
example postgresql = "pgsql:host=localhost;port=5432;dbname=mydb;" */

/* -> is used to access any property or method inside an object*/
 
/*setAttribute = a method used to adding a parametre or property of a PDO object;
setAttribute form: $object->setAttribute(attribute_name, value);*/

/* :: → used to access constant properties and static methods directly inside a class. */

/**/