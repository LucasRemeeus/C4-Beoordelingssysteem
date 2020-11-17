<?php
session_start();
if ($_SESSION['loggedin'] ===! true)
{
    header('location:../index.php');
    die();
}
require 'config.php';

$ID = $_POST['id'];
$Voornaam = $_POST['Voornaam'];
$Achternaam = $_POST['Achternaam'];

if(is_numeric($ID) >0 && strlen($Voornaam) >0 && strlen($Achternaam) >0){
    $statement = $mysqli -> prepare("UPDATE `leerling` SET Voornaam = ?,  Achternaam = ? WHERE ID_Leerling = ?");
    $statement -> bind_param('ssi', $Voornaam, $Achternaam, $ID);
    if($statement -> execute()){
        header("location:dashboard.php");
    }
    else{
        echo "er is iets zeker fout gegaan";
    }
}else{
    echo "er is iets fout gegaan";
}