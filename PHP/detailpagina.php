<?php
session_start();
require_once 'config.php';
	
if ($_SESSION['loggedin'] ===! true)
{
    header('location:../index.php');
	die();
}
$mentorInfo = $mysqli->prepare("SELECT Voornaam, Achternaam, ID_Docent FROM docenten WHERE Username=?");
$mentorInfo->bind_param("s", $_SESSION['username']);
$mentorInfo->execute();
$mentorInfo->bind_result($mVoornaam, $mAchternaam, $mID);
$mentorInfo->fetch();
$mentorInfo->close();

$ID = $_GET['id'];
$statement = $mysqli -> prepare("SELECT * FROM `leerling` WHERE ID_Leerling = ?");
$statement -> bind_param('i', $ID);
$statement -> execute();
$result = $statement->get_result();
$row = $result->fetch_assoc();

$puntensql = $mysqli -> prepare("SELECT * FROM `punten` WHERE ID_Leerling = ? AND Datum = CURDATE()");
$puntensql -> bind_param('i', $row['ID_Leerling']);
$puntensql -> execute();
$presult = $puntensql->get_result();
$pluspunten = 0;
$minpunten = 0;
while ($prow = $presult->fetch_assoc()){
    if ($prow['Punt'] == 1){
        $pluspunten++;
    }else if($prow['Punt'] == 0){
        $minpunten++;
    }
}

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
            <a class="navbar-brand mx-auto text-center text-dark knop" href="dashboard.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-center text-dark knop" href="loguit.php">Uitloggen</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 mt-5 ml-5">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="img-square-wrapper">
                            <img class="float-right profile mt-5 mr-5" src="../IMG/14.svg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Voornaam: <?php echo $row['Voornaam'];?></h5>
                            <h5 class="card-title">Achternaam: <?php echo $row['Achternaam'];?></h5><br><br>
                            <h5 class="card-title">Klas: <?php echo $row['Klas'];?></h5>
                            <h5 class="card-title">Mentor: <?php echo $mVoornaam." ".$mAchternaam;?></h5>
                            <hr>
                            <div class="Cirkel">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-11 mt-5 ml-5">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="card-body">
                            <table class="text-center detailtable">
                                <tr>
                                    <th>Datum:</th>
                                    <th>Punten:</th>
                                    <th>Opmerkingen:</th>
                                </tr>
                                <?php
                                    $statement2 = $mysqli -> prepare("SELECT * FROM `punten` WHERE ID_Leerling = ?");
                                    $statement2 -> bind_param('i', $ID);
                                    $statement2 -> execute();
                                    $result2 = $statement2->get_result();
                                    while ($row2 = $result2->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td>" . $row2['Datum']. "</td>";
                                        if($row2['Punt'] == 0){
                                            echo "<td> -1 </td>";
                                        }else if($row2['Punt'] == 1){
                                            echo "<td> +1 </td>";
                                        }
                                        echo "<td>" . $row2['Opmerking']. "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>