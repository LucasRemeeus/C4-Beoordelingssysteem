<?php
session_start();
if ($_SESSION['loggedin'] ==! true || !isset($_SESSION['loggedin']))
{
    header('location:../index.php');
    die();
}
require_once 'config.php';
$mentorInfo = $mysqli->prepare("SELECT Voornaam, Achternaam, ID_Docent FROM docenten WHERE Username=?");
$mentorInfo->bind_param("s", $_SESSION['username']);
$mentorInfo->execute();
$mentorInfo->bind_result($mVoornaam, $mAchternaam, $mID);
$mentorInfo->fetch();
$mentorInfo->close();

$klasInfo = $mysqli->prepare("SELECT Klas FROM docentkopeling WHERE ID_Docent = ?");
$klasInfo->bind_param("i", $mID);
$klasInfo->execute();
$klasInfo->bind_result($Klas);
$klasInfo->fetch();
$klasInfo->close();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-md shadow-lg bg-white">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="#">Hallo, <?php echo $mVoornaam." ".$mAchternaam ?></a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand text-center text-dark knop" href="home.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand text-center text-dark knop" href="leerling_toevoegen.php">Toevoegen</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-center text-dark knop" href="loguit.php"><b>Uitloggen</b></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 mt-5 ml-5">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="card-body">
                            <table class="text-center detailtable">
                                <table>
                                    <tr>
                                        <th>Voornaam:</th>
                                        <th>Achternaam:</th>
                                        <th>Klas:</th>
                                        <th>Bewerken:</th>
                                        <th>Verwijderen:</th>
                                    </tr>

                                    <?php
                                    $statement = $mysqli -> prepare("SELECT * FROM `Leerling` WHERE Klas = ?");
                                    $statement->bind_param("s", $Klas);
                                    $statement -> execute();
                                    $result = $statement->get_result();
                                    while ($row = $result->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td>" . $row['Voornaam']. "</td>";
                                        echo "<td>" . $row['Achternaam']. "</td>";
                                        echo "<td>" . $row['Klas']. "</td>";
                                        echo "<td><a href='Leerling_wijzig.php?id=".$row['ID_Leerling']."'>Bewerk</a></td>";
                                        ?><script>
                                        function Confirm(ID_Leerling) {
                                            var r = confirm("Weet je zeker dat je het wilt verwijderen?");
                                            if (r == true) {
                                                window.location.replace(
                                                    "Leerling_verwijder.php?id="+ID_Leerling);
                                            }
                                        }
                                    </script>
                                    <?php
                                        echo "<td><button onclick='Confirm(ID_Leerling =". $row['ID_Leerling'] .")'>Verwijderen</button></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>