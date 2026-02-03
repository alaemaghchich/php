<?php
// Définition des fonctions

// Fonction pour calculer la moyenne
function calculerMoyenne($notes) {
    $somme = 0;
    $nbNotes = count($notes);
    foreach ($notes as $note) {
        $somme += $note;
    }
    return $somme / $nbNotes;
}

// Fonction pour obtenir la mention
function getMention($moyenne) {
    if ($moyenne >= 16) {
        return "Très Bien";
    } elseif ($moyenne >= 14) {
        return "Bien";
    } elseif ($moyenne >= 12) {
        return "Assez Bien";
    } elseif ($moyenne >= 10) {
        return "Passable";
    } else {
        return "Insuffisant";
    }
}

// Traitement du formulaire
$resultat = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $note1 = floatval($_POST['note1']);
    $note2 = floatval($_POST['note2']);
    $note3 = floatval($_POST['note3']);

    $notes = [$note1, $note2, $note3];

    // Vérification des notes entre 0 et 20
    $valid = true;
    foreach ($notes as $note) {
        if ($note < 0 || $note > 20) {
            $valid = false;
            break;
        }
    }

    if ($valid) {
        $moyenne = calculerMoyenne($notes);
        $mention = getMention($moyenne);
        $resultat = "Étudiant: $nom <br> Moyenne: $moyenne / 20 <br> Mention: $mention";
    } else {
        $resultat = "Erreur: Les notes doivent être comprises entre 0 et 20.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul de la moyenne</title>
</head>
<body>
    <h2>Saisie des notes de l'étudiant</h2>
    <form method="post" action="">
        <label>Nom de l’étudiant:</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Note 1:</label><br>
        <input type="number" name="note1" min="0" max="20" step="0.01" required><br><br>

        <label>Note 2:</label><br>
        <input type="number" name="note2" min="0" max="20" step="0.01" required><br><br>

        <label>Note 3:</label><br>
        <input type="number" name="note3" min="0" max="20" step="0.01" required><br><br>

        <input type="submit" value="Calculer la moyenne">
    </form>

    <hr>
    <?php
    if ($resultat != "") {
        echo "<div>$resultat</div>";
    }
    ?>
</body>
</html>
