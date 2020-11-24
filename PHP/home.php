<?php
session_start();
require 'config.php';
	
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
            <a class="navbar-brand mx-auto text-center text-dark knop" href="dashboard.php">Dashboard</a>
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
<!--      TODO: While loop      -->
<?php

$statement = $mysqli -> prepare("SELECT * FROM `leerling`");
$statement -> execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()){ ?>
            <div class="col-2 mt-3">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="img-square-wrapper">
                            <a href="detailpagina.php"><img class="float-right profile mt-5 mr-5" src="../IMG/1.svg" alt="Card image cap"></a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"> <?php echo $row['Voornaam'] ." ". $row['Achternaam'] ?> </h4>
                            <div class="totaal">
                                <div class="good" onclick="Goed()">
                                    <img class="duim" src="../IMG/duim-omhoog.png" onclick="GoedPunt()" alt="Duim omhoog">
                                </div>
                                <div class="float-right text-center rounded-circle punten">
                                    <p class="punt">0</p>
                                </div>
                                <div class="bad mt-5" onclick="Slecht()">
                                    <img class="duim" src="../IMG/duim-omlaag.png" onclick="SlechtPunt()" alt="Duim omhoog">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
            ?>
<!--            -->
        </div>
    </div>

    <div id="resultaat"></div>

    <script src="../JS/iets.js"></script>
    <script src="../JS/punt.js"></script>
</body>

</html>