<?php
session_start();
require_once 'php/config.php';
	
if ($_SESSION['student_ID'] == 0)
{
	header('location:/php/inlog.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            <a href="index.php" class="nav-link">
                <img src="img/bepis_logo2.png" alt="logo">
                <span class="link-text logo-text">BEPIS</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="php/loguit.php" class="nav-link">
                <span class="link-text">Uitloggen</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="php/bedrijf_toevoegen.php" class="nav-link">
                <span class="link-text">Bedrijf toevoegen</span>
            </a>
        </li>
    </ul>
</nav>
<main>
<?php
if($_GET['Deletion'] === "1"){
echo "<p>Deletion successful</p>";
}else if($_GET['Deletion'] === "0") {
    echo "<p>Deletion Failed</p>";
}
?>
    <div class="table">
<table>
    <th><i>Stages:</i></th>
    <tr>
        <th>Bedrijf:</th>
        <th>Datum:</th>
        <th>telefoon:</th>
        <th>adres:</th>
        <th>Bewerk:</th>
        <th>Delete:</th>
        <th>Review:</th>
    </tr>
    <?php
    $ID = $_SESSION['student_ID'];
    $statement = $mysqli -> prepare("SELECT bedrijfen.* FROM `bedrijfen`, `studenten` WHERE bedrijfen.studentnr = studenten.studentnr AND student_ID = ?");
    $statement -> bind_param('i', $ID);
    $statement -> execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()){

        $statement2 = $mysqli -> prepare("SELECT * FROM `recensie` WHERE bedrijf = ?");
        $statement2 -> bind_param('i', $row['ID']);
        $statement2 -> execute();
        $result2 = $statement2->get_result();
        $row2 = $result2->fetch_assoc();

        if($row['ID'] == $row2['bedrijf'] ){
        echo "<tr>";
        echo "<td>" . $row['bedrijfsnaam'] . "</td>";
        echo "<td>" . $row['begin_datum'] . "</td>";
        echo "<td>" . $row['telefoonnummer'] . "</td>";
        echo "<td>" . $row['adres'] . "</td>";
        echo "<td><a href='php/bewerk.php?id=".$row['ID'] ."' >Bewerk</a></td>";

        ?><script>
            function Confirm() {
                var r = confirm("Weet je zeker dat je het wilt verwijderen?");
                if (r == true) {
                    window.location.replace("/php/delete.php?ID=<?php echo $row['ID'];?>");
                }
            }
        </script>
        <?php
        echo "<td><button onclick='Confirm()'>Delete</button></td>";
        echo "<td> gemiddeld: ". round(($row2['beoordeling_bedrijf'] + $row2['beoordeling_technieken'] + $row2['beoordeling_begleider']) / 3, 1) ."</td>";
        echo "</tr>";
        }else{
            echo "<tr>";
            echo "<td>" . $row['bedrijfsnaam'] . "</td>";
            echo "<td>" . $row['begin_datum'] . "</td>";
            echo "<td>" . $row['telefoonnummer'] . "</td>";
            echo "<td>" . $row['adres'] . "</td>";
            echo "<td><a href='php/bewerk.php?id=".$row['ID'] ."' >Bewerk</a></td>";

            ?><script>
                function Confirm() {
                    var r = confirm("Weet je zeker dat je het wilt verwijderen?");
                    if (r == true) {
                        window.location.replace("/php/delete.php?ID=<?php echo $row['ID'];?>");
                    }
                }
            </script>
            <?php
            echo "<td><button onclick='Confirm()'>Delete</button></td>";
            echo "<td><a href='php/review.php?id=".$row['ID']."' >Review</a></td>";
            echo "</tr>";
        }
    }
    ?>
</table>
    </div>
</main>

<footer class="footer">
    <p>All rights reserved: Bepis 2020</p>
    <p><a href="mailto:Help@Bepis.com">Help@Bepis.com</a></p>
</footer>
</body>
</html>
