<?php
session_start();
if ($_SESSION['loggedin'] === true) {
    header('location:/php/inlog.php');
    die();
}
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="lid_toevoegen.php">Voeg lid toe</a>
<table>
    <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Klas</th>
    </tr>

    <?php
    $statement = $mysqli -> prepare("SELECT * FROM `Leerling`");
    $statement -> execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['Voornaam']. "</td>";
        echo "<td>" . $row['Achternaam']. "</td>";
        echo "<td>" . $row['Klas']. "</td>";
        echo "<td><a href='lid_wijzig.php?id=".$row['id']."'>Bewerk</a></td>";
        echo "<td><a href='lid_verwijder.php?id=".$row['id']."'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>