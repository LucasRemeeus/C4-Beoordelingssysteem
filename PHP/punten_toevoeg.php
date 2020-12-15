<?php
session_start();

require 'config.php';

if ($_SESSION['loggedin'] ==! true || !isset($_SESSION['loggedin']))
{
    header('location:../index.php');
    die();
}

$IDLeerling = $_GET['ID_Leerling'];
$IDDocent = '1';
$Punt = $_GET['punt'];
$Datum = '1111-11-11';

$Opmerking = $_GET['opmerking'];

$query =  "INSERT INTO punten (ID_Punten, ID_Leerling, ID_Docent, Punt, Opmerking, Datum) VALUES (NULL, '$IDLeerling', '$IDDocent', '$Punt', '$Opmerking', NOW())";

$result = mysqli_query($mysqli, $query);
echo $Opmerking;
echo $Punt;

