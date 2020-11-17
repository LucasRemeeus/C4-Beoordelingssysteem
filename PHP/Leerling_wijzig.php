<?php
session_start();
if ($_SESSION['loggedin'] ===! true)
{
    header('location:../index.php');
    die();
}
require 'config.php';
$id = $_GET['id'];

$statement = $mysqli -> prepare("SELECT * FROM `Leerling` WHERE ID_Leerling = ?");
$statement -> bind_param('i', $id);
$statement -> execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="Leerling_wijzig_verwerk.php" method="post">
    <input type="number" name="id" id="id" value="<?php echo $row['ID_Leerling']?>" required hidden readonly>
    <p>
        <label for="first_name" >Voornaam:</label>
        <input type="text" name="Voornaam" id="Voornaam" value="<?php echo $row['Voornaam']?>" required>
    </p>
    <p>
        <label for="last_name" >Achternaam:</label>
        <input type="text" name="Achternaam" id="Achternaam" value="<?php echo $row['Achternaam']?>" required>
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Opslaan">
        <button onclick="history.back();return false;">Annuleer</button>
    </p>
</form>
<?php
}
?>
</body>
</html>