<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leerling toevoeg!</title>
</head>

<body>
<form action="leerling_toevoegen_verwerk.php" method="post">
    <label for="voornaam">Voornaam</label>
    <input name="voornaam" id="voornaam" required>
    <label for="achternaam">achternaam</label>
    <input name="achternaam" id="achternaam" required>
    <label for="klas">klas</label>
    <input name="klas" id="klas" required>
    <input type="submit" name="submit" value="submit">
</form>

</body>
</html>