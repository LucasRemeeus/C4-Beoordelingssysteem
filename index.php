<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login_form.css">
    <script src="js/login_form.js" defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?php
if (isset($_POST['inlog']))
{
    require 'php/config.php';

    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord = $_POST['Wachtwoord'];


        $statement = $mysqli -> prepare("SELECT * FROM docenten WHERE Username = ? AND Password = ?");
        $statement ->bind_param('ss', $Gebruikersnaam, $Wachtwoord);
        $statement -> execute();
        $result = $statement->get_result();
        if($result->num_rows == 1){
            session_start();
            $_SESSION['username'] = $Gebruikersnaam;
            $_SESSION['loggedin'] = true;
            header('location:PHP/home.php');
    }
    else
    {
    ?>
       <div class="login-form">
        <div class="textb">
            <label class="submit">Gebruikersnaam of Wachtwoord is onjuist.</label>
        </div>

        <div class="textb">
            <a href="index.php">Klik hier om terug te gaan</a>
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
        </div><br>

        <div class="captcha_wrapper">
            <div class="g-recaptcha" data-sitekey="6LfDoeIZAAAAAPaG2gLzY4ZOo0n1GIL1kfxSKnG4"></div>
        </div>

        <button class="btn fas fa-arrow-right" type="submit" name="inlog" ></button>

    </form>
    <?php
}
?>

</body>
</html>
