<?php
session_start();
require_once 'php/config.php';
	
if ($_SESSION['loggedin'] === true)
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


    <nav class="navbar navbar-expand-md shadow-lg bg-white">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="#">Hallo, Meneer Remeeus</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto text-dark" href="dashboard.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="loguit.php">Uitloggen</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 mt-3">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="img-square-wrapper">
                            <img class="float-right profile" src="../IMG/001-cat.svg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Wraith. S</h4>
                            <div class="totaal">
                                <div class="good">
                                    <img class="duim" src="../IMG/duim-omhoog.png" alt="Duim omhoog">
                                </div>
                                <div class="float-right text-center rounded-circle punten">
                                    <p>0</p>
                                </div>
                                <div class="bad mt-5">
                                    <img class="duim" src="../IMG/duim-omlaag.png" alt="Duim omhoog">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 mt-3">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="img-square-wrapper">
                            <img class="float-right profile" src="../IMG/002-horse.svg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Wraith. S</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 mt-3">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="img-square-wrapper">
                            <img class="float-right profile" src="../IMG/003-gorilla.svg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Wraith. S</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 mt-3">
                <div class="card corner">
                    <div class="card-vertical">
                        <div class="img-square-wrapper">
                            <img class="float-right profile" src="../IMG/011-giraffe.svg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Wraith. S</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>