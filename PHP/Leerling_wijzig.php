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

        <form action="Leerling_wijzig_verwerk.php" method="post" class="toevoeg-form">
            <h1>Leerling Wijzigen</h1>
            <input type="number" name="id" id="id" value="<?php echo $row['ID_Leerling']?>" required hidden readonly>

            <div class="textb">
                <input type="text" name="Voornaam" id="voornaam" value="<?php echo $row['Voornaam']?>" required>
                <div class="placeholder">Voornaam</div>
            </div>

            <div class="textb">
                <input type="text" name="Achternaam" id="achternaam" value="<?php echo $row['Achternaam']?>" required>
                <div class="placeholder">Achternaam</div>
            </div>

            <button class="loguit" id="submit" type="submit" name="submit" value="Verzenden">Verzenden</button>

        </form>

    </div>
<?php
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>