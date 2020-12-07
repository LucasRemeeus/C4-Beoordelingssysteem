<?php
session_start();
if ($_SESSION['loggedin'] ==! true || !isset($_SESSION['loggedin']))
{
    header('location:../index.php');
    die();
}
require_once 'config.php';
$id = $_GET['id'];
if(is_numeric($id)){
    $statement = $mysqli->prepare("DELETE FROM leerling WHERE ID_Leerling = ?");
    $statement -> bind_param('i', $id);
    if($statement -> execute()){
        header("location:dashboard.php");
    }
}