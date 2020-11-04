<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login_form.css">
    <script src="../js/login_form.js" defer></script>
</head>
<body>
<?php
if (isset($_POST['inlog']))
{
    require 'config.php';

    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord = $_POST['Wachtwoord'];

    $opdracht = "SELECT * FROM login
                 WHERE gebruikersnaam = '$Gebruikersnaam'
                 AND wachtwoord = '$Wachtwoord'";


    $resultaat = mysqli_query($mysqli, $opdracht);

    if (mysqli_num_rows($resultaat) > 0)
    {

        $user = mysqli_fetch_array($resultaat);

        $_SESSION['gebruikersnaam'] = $user['gebruikersnaam'];
        $_SESSION['student_ID'] = $user['student_ID'];
        $_SESSION['docent_ID'] = $user['docent_ID'];

    if ($_SESSION['student_ID'] > 0 )
    {

      header("location:../home.php?id=".$_SESSION['student_ID']."");
    }
    elseif ($_SESSION['docent_ID'] > 0)
    {

      header("location:../mentor.php?id=".$_SESSION['docent_ID']."");
    }


    }
    else
    {
    ?>
       <div class="login-form">
        <div class="textb">
            <label class="submit">Gebruikersnaam of Wachtwoord is onjuist.</label>
        </div>

        <div class="textb">
            <a href="inlog.php">Klik hier om terug te gaan</a>
        </div>
       </div>
    <?php
    }
}
else
{
    ?>
    <form method="POST" action="" class="login-form">
        <h1>Log in</h1>
        <div class="textb">
            <input type="text" name="Gebruikersnaam" required>
            <div class="placeholder">Gebruikersnaam</div>
        </div>

        <div class="textb">
            <input type="password" name="Wachtwoord" required>
            <div class="placeholder">Wachtwoord</div>
            <div class="show-password fas fa-eye-slash">
        </div>

        <div class="checkbox">
            <input type="checkbox">
            <div class="fas fa-check"></div>
            Blijf ingelogd
        </div>

        <button class="btn fas fa-arrow-right" type="submit" name="inlog" ></button>
    </form>
    <?php
}
?>

</body>
</html>
