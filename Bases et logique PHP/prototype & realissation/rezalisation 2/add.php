<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
  display: block; 
  margin-bottom: 5px; }

    </style>
</head>
<body>
    <form action="traitement.php" method="post">

<fieldset><legend>Patient information</legend>
    <label>name</label>
    <input type="text" name="name" required><br>

    <label>last name</label>
    <input type="text" name="lastname" required><br>

    <label >birth date</label>
    <input type="date" name="date"><br>

    <label>sex</label>
    <select name="sex" required>
    <option disabled selected>sex</option>
    <option value="man">man</option>
    <option value="women">women</option>
    </select><br>

    <label>tel</label>
    <input type="tel" name="tel">
</fieldset>
<br>

<fieldset><legend>Consultation information</legend>
   <label>Consultation Date</label>
        <input type="date" name="date_consultation" required>

        <label>Reason for Consultation</label>
        <textarea name="reason" required></textarea>

        <label>Body Temperature (°C)</label>
        <input type="number" step="0.1" name="temperature" required>

        <label>Blood Pressure</label>
        <input type="number" name="tension_sys" placeholder="Systolic" required>
        <input type="number" name="tension_dia" placeholder="Diastolic" required>

        <label>Weight (kg)</label>
        <input type="number" step="0.1" name="poids" required>

        <label>Height (m)</label>
        <input type="number" step="0.01" name="taille" required>

        <label>Symptoms</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="symptomes[]" value="Fever"> Fever</label>
            <label><input type="checkbox" name="symptomes[]" value="Cough"> Cough</label>
            <label><input type="checkbox" name="symptomes[]" value="Fatigue"> Fatigue</label>
            <label><input type="checkbox" name="symptomes[]" value="Headache"> Headache</label>
        </div>

        <button type="submit">Save Consultation</button>
        <button type="reset">reset</button>
</fieldset>
    </form>
</body>
</html>