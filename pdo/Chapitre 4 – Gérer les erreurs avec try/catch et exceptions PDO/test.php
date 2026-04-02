<?php
$dsn = 'mysql:host=localhost;dbname=ma_base';
$user = 'root';
$password = 'mauvais_pass';

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Successfully connected!";

} catch (PDOException $e) {

    $date = date('Y-m-d H:i:s');
    $message_erreur = "[" . $date . "] Erreur PDO : " . $e->getMessage() . "\n";

    file_put_contents('errors.log', $message_erreur, FILE_APPEND);

    echo "Sorry, we had a technical problem. The support team has been informed.";
}
?>