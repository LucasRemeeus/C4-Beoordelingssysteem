<?php session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uitgelogd</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/loguit.css">
    <script src="../js/login_form.js" defer></script> 
</head>
<body>
    <form method="POST" action="inlog.php" class="login-form">
        <h1>U bent uitgelogd!</h1>

        <button class="loguit">Opnieuw inloggen</button>
    
        <a href="../index.php">Terug naar Homepage</a><br>

    </form>

</body>
</html>