<?php
session_start();
if ($_SESSION['loggedin'] === true) {
    header('location:/php/inlog.php');
    die();
}
require 'config_inc.php';

$ID = $_POST['ID_Leerling'];
$Voornaam = $_POST['Voornaam'];
$Achternaam = $_POST['Achternaam'];

if(is_numeric($ID) >0 && strlen($Voornaam) >0 && strlen($Achternaam) >0){
    $statement = $mysqli -> prepare("UPDATE `back2_leden` SET Voornaam = ?,  Achternaam = ? WHERE ID_Leerling = ?");
    $statement -> bind_param('ssi', $Voornaam, $Achternaam, $ID);
    if($statement -> execute()){
        header("location:home.php");
    }
    else{
        echo "er is iets zeker fout gegaan";
    }
}else{
    echo "er is iets fout gegaan";
}