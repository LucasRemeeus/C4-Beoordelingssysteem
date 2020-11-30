<?php

require 'config.php';
$statement = $mysqli -> prepare("SELECT * FROM `leerling`");
$statement -> execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()){
    $punten = 0;
    ?>

    <div class="col-2 mt-3">
        <div class="card corner">
            <div class="card-vertical">
                <div class="img-square-wrapper">
                    <a href="detailpagina.php?id=<?php echo $row['ID_Leerling']?>"><img class="float-right profile mt-5 mr-2" src="../IMG/1.svg" alt="Card image cap"></a>
                </div>
                <div class="card-body">
                <h4 class="card-title font-weight-bold text"> <?php echo $row['Voornaam'] ." ". $row['Achternaam'] ?> </h4>
                    <div class="totaal">
                        <div class="good" onclick="GoedPunt(leerling_ID = <?php echo $row['ID_Leerling']; ?>)">
                            <img class="duim" src="../IMG/duim-omhoog.png" alt="Duim omhoog">
                        </div>
                        <?php
                        $puntensql = $mysqli -> prepare("SELECT * FROM `punten` WHERE ID_Leerling = ? AND Datum = CURDATE()");
                        $puntensql -> bind_param('i', $row['ID_Leerling']);
                        $puntensql -> execute();
                        $presult = $puntensql->get_result();

                        while ($prow = $presult->fetch_assoc()){
                            if ($prow['Punt'] == 1){
                                $punten++;
                            }else if($prow['Punt'] == 0){
                                $punten--;
                            }
                        }
                        switch ($punten) {
                            case 0:
                                $kleur = "green";
                                break;
                            case 1:
                                $kleur = "blue";
                                break;
                            case 2:
                                $kleur = "red";
                                break;
                            case 3:
                                $kleur = "green";
                                break;
                        }
                        ?>
                        <div style="background-color: <?php echo $kleur; ?>;" class="float-right text-center rounded-circle punten">
                            <p class="punt"><?php echo $punten; ?></p>
                        </div>
                        <div class="bad mt-5" onclick="SlechtPunt(leerling_ID = <?php echo $row['ID_Leerling']; ?>)">
                            <img class="duim" src="../IMG/duim-omlaag.png" alt="Duim omhoog">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>