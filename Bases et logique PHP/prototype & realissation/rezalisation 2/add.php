<!DOCTYPE html>
<html>
<head>
    <title>Add Consultation</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #eef2f7;
            padding: 30px;
        }

        form {
            background-color: white;
            padding: 25px;
            width: 500px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }

        h2, h3 { color: #2c3e50; }
        label { 
         display: block;
         margin-top: 12px;
         font-weight: bold; }
        input, select { 
         width: 100%;
         padding: 8px;
         margin-top: 5px;
         border-radius: 4px;
         border: 1px solid #ccc; }
        input[type="checkbox"] { 
         width: auto;
         margin-right: 5px; }
        button {
         margin-top: 15px; 
         padding: 10px; 
         width: 100%; 
         background-color: #27ae60; 
         color: white; 
         border: none; 
         border-radius: 4px; 
         font-size: 16px; }
        button:hover { background-color: #219150; }
        a { text-decoration: none; color: #3498db; margin-top: 10px; display: inline-block; }
    </style>
</head>
<body>
<div>
<h2>Add New Consultation</h2>

<form action="traitement.php" method="POST">

<h3>Patient Information</h3>
<label>First Name</label>
<input type="text" name="prenom">
<label>Last Name</label>
<input type="text" name="nom">
<label>Birth Date</label>
<input type="date" name="date_naissance">
<label>Gender</label>
<select name="sexe">
    <option value="">Select</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
<label>Phone</label>
<input type="text" name="telephone">

<h3>Consultation Information</h3>
<label>Consultation Date</label>
<input type="date" name="date_consultation">
<label>Reason</label>
<input type="text" name="motif">
<label>Temperature (°C)</label>
<input type="number" step="0.1" name="temperature">
<label>Systolic Pressure</label>
<input type="number" name="sys">
<label>Diastolic Pressure</label>
<input type="number" name="dia">
<label>Weight (kg)</label>
<input type="number" step="0.1" name="poids">
<label>Height (m)</label>
<input type="number" step="0.01" name="taille">

<h3>Symptoms</h3>
<label><input type="checkbox" name="symptomes[]" value="Fever"> Fever</label>
<label><input type="checkbox" name="symptomes[]" value="Cough"> Cough</label>
<label><input type="checkbox" name="symptomes[]" value="Fatigue"> Fatigue</label>
<label><input type="checkbox" name="symptomes[]" value="Headache"> Headache</label>

<button type="submit">Save Consultation</button>
</form>

<br><a href="index.php">View Consultations</a>
</div>
</body>
</html>
