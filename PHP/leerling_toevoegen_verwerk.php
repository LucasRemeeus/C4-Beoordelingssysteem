<?php
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$klas = $_POST['klas'];

if(strlen($voornaam) >0 && strlen($achternaam) >0 && strlen($klas) ){
        $statement = $mysqli->prepare("INSERT INTO `Leerling` (`ID_Leerling`, `Voornaam`, `Achternaam`, `Klas`) VALUES (NULL, ?, ?, ?)");
        $statement->bind_param('sss', $voornaam,$achternaam, $klas);
        if($statement->execute()){
            header("location:dashboard.php");
        }else{
            echo "Oops er is iets fout gegaan";
        }
        $statement->close();
}