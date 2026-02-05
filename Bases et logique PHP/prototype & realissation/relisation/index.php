<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Notes</title>
    <style>
        label { display: block; margin-top: 8px; font-weight: bold; }
        input, select { margin-bottom: 5px; }
        input, select, option{padding: 10px; width: 200px;}
    </style>
</head>
<body>
    <form action="traitement.php" method="post">
        
        <label>Name</label>
        <input type="text" name="name" required><br>

        <label>Last Name</label>
        <input type="text" name="lastname" required><br>

        <label>Birth Date</label>
        <input type="date" name="date" required><br>

        <label>Filiere</label>
        <select name="filiere">
            <option value="scmath">Sc Math</option>
            <option value="scpc">Sc PC</option>
            <option value="scsvt">Sc SVT</option>
        </select><br>

        <label>Physique</label>
        <input type="number" name="notepc1" min="0" max="20" step="0.25" placeholder="Note 1" required>
        <input type="number" name="notepc2" min="0" max="20" step="0.25" placeholder="Note 2" required><br>

        <label>English</label>
        <input type="number" name="noteen1" min="0" max="20" step="0.25" placeholder="Note 1" required>
        <input type="number" name="noteen2" min="0" max="20" step="0.25" placeholder="Note 2" required><br>

        <label>Math</label>
        <input type="number" name="notemath1" min="0" max="20" step="0.25" placeholder="Note 1" required>
        <input type="number" name="notemath2" min="0" max="20" step="0.25" placeholder="Note 2" required><br>

        <label>Philosophie</label>
        <input type="number" name="noteph1" min="0" max="20" step="0.25" placeholder="Note 1" required>
        <input type="number" name="noteph2" min="0" max="20" step="0.25" placeholder="Note 2" required><br>

        <label>SVT</label>
        <input type="number" name="notesvt1" min="0" max="20" step="0.25" placeholder="Note 1" required>
        <input type="number" name="notesvt2" min="0" max="20" step="0.25" placeholder="Note 2" required><br>
        <br>
        <button type="submit">submit</button>
        <button type="reset">reset</button>
    </form>
</body>
</html>