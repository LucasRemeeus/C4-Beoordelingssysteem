<?php
session_start();
if ($_SESSION['loggedin'] === true) {
    header('location:/php/inlog.php');
    die();
}
require_once 'config.php';
$id = $_GET['id'];
if(is_numeric($id)){
    $statement = $mysqli->prepare("DELETE FROM Leerling WHERE ID_Leerling = ?");
    $statement -> bind_param('i', $id);
    if($statement -> execute()){
        header("location:home.php");
    }
}