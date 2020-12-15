<?php

if ($_SESSION['loggedin'] ==! true || !isset($_SESSION['loggedin']))
{
    header('location:../index.php');
    die();
}

$voornaam = $_POST['Voornaam'];
$achternaam = $_POST['Achternaam'];
$klas = $_POST['Klas'];
$Icon = $_POST['Icon'];
require_once 'config.php';
if(strlen($voornaam) >0 && strlen($achternaam) >0 && strlen($klas) ){
        $statement = $mysqli->prepare("INSERT INTO `Leerling` (`ID_Leerling`, `Voornaam`, `Achternaam`, `Klas`, `img`) VALUES (NULL, ?, ?, ?, ?)");
        $statement->bind_param('sssi', $voornaam,$achternaam, $klas, $Icon);
        if($statement->execute()){
            header("location:dashboard.php");
        }else{
            echo "Oops er is iets fout gegaan";
        }
        $statement->close();
}