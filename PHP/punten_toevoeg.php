<?php

require 'config.php';

$IDLeerling = '12';
$IDDocent = '12';
$Punt = $_GET['lp'];
$Datum = '1111-11-11';

$Opmerking = $_GET['wp'];

$query =  "INSERT INTO punten (ID_Punten, ID_Leerling, ID_Docent, Punt, Opmerking, Datum) VALUES (NULL, '$IDLeerling', '$IDDocent', '$Punt', '$Opmerking', '$Datum')";

$result = mysqli_query($mysqli, $query);

                if ($result) {
                    echo "Gelukt!";
                    
                } else {
                    echo 'Er ging wat mis met het toevoegen';
                }

echo $Opmerking;
echo $Punt;

