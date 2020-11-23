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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leerling Toevoegen!</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../CSS/toevoeg.css">  
</head>
<body>

<!-- Nav bar -->
<nav class="navbar navbar-expand-md shadow-lg bg-white">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="#">Hallo, Meneer Remeeus</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand text-center text-dark mr-5 knop" href="home.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto text-center text-dark knop" href="dashboard.php">Terug</a>
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

    <div class="toevoegen">

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
        
    </div>
<?php
}
?>
</body>
</html>