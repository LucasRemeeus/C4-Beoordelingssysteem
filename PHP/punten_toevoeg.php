<?php

require 'config.php';

$IDLeerling = $_GET['ID_Leerling'];
$IDDocent = '1';
$Punt = $_GET['punt'];
$Datum = '1111-11-11';

$Opmerking = $_GET['opmerking'];

$query =  "INSERT INTO punten (ID_Punten, ID_Leerling, ID_Docent, Punt, Opmerking, Datum) VALUES (NULL, '$IDLeerling', '$IDDocent', '$Punt', '$Opmerking', NOW())";

$result = mysqli_query($mysqli, $query);

                if ($result) {
                    echo "Gelukt!";
                    
                } else {
                    echo 'Er ging wat mis met het toevoegen';
                }

echo $Opmerking;
echo $Punt;

