<?php
function verifierNotes($notes) {
    foreach ($notes as $note) {
        if ($note < 0 || $note > 20) {
            return false;
        }
    }
    return true;
}

function avg($note1, $note2) {
    return ($note1 + $note2) / 2;
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
        return "failed";
    }}
function finalResult($moyenne) {
    return ($moyenne >= 10) ? "Admitted" : "Failed";
}
?>