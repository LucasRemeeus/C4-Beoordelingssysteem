<?php
session_start();
if ($_SESSION['loggedin'] ===! true)
{
    header('location:../index.php');
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
<a href="leerling_toevoegen.php">Voeg lid toe</a>
<a href="home.php">Terug</a>
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
        echo "<td><a href='Leerling_wijzig.php?id=".$row['ID_Leerling']."'>Bewerk</a></td>";
        ?><script>
            function Confirm() {
                var r = confirm("Weet je zeker dat je het wilt verwijderen?");
                if (r == true) {
                    window.location.replace("Leerling_verwijder.php?id=<?php echo $row['ID_Leerling'];?>");
                }
            }
        </script>
        <?php
        echo "<td><button onclick='Confirm()'>Delete</button></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>