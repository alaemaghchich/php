<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom   = $_POST['nom'];
    $note1 = $_POST['note1'];
    $note2 = $_POST['note2'];
    $note3 = $_POST['note3'];

    $notes = [$note1, $note2, $note3];

    function avg($notes) {
        return array_sum($notes) / count($notes);
    }

  function getMention($moyenne) {
    if ($moyenne >= 16) {
        return "Very Good";
    } elseif ($moyenne >= 14) {
        return "Good";
    } elseif ($moyenne >= 12) {
        return "Fairly Good";
    } elseif ($moyenne >= 10) {
        return "Pass";
    } else {
        return "fail";
    }}

  if($nom === "" || $note1 === "" || $note2 === "" || $note3 === "") {
    echo "All inputs are required";
    exit;
}


    if (min($notes) >= 0 && max($notes) <= 20) {
        $moyenne = avg($notes);
        $mention = getMention($moyenne);

        echo "<div>
            Student: $nom <br>
            Average: $moyenne / 20 <br>
            Montion: $mention
        </div>";
    } else {
        echo "Error: grades must be between 0 and 20";
    }
}
?>
<style>
    body{
        background-image: url(school-education-seamless-pattern-vector-45436158.avif);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    div{
        background-color: lightgray;
        height: 250px;
        width: 400px;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        line-height: 50px;
        font-size: x-large;

    }
</style>
