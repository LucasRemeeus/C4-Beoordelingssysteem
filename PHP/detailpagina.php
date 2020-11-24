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
            <div class="col-2 mt-5 ml-5">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="img-square-wrapper">
                            <img class="float-right profile mt-5 mr-5" src="../IMG/14.svg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Voornaam: <p>Joeri</span></h5>
                            <h5 class="card-title">Achternaam: Dekker</h5><br><br>
                            <h5 class="card-title">Klas: 8a1</h5>
                            <h5 class="card-title">Mentor: Bever Lucas Remeeus</h5>
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
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                                <tr>
                                    <td>11-11-2020</td>
                                    <td>+1</td>
                                    <td>Te pussy in Phasmophobia</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>