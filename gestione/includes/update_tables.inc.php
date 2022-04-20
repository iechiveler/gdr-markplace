<?php

$pureRace = $array[1];

$sql = "UPDATE animali_catalogo SET id_razza='$pureRace', nome='$nameAnim', acquirente='$nameAcqui', destinatario='$nameDest', sesso='$newSex', eta='$ageAnim', url_path='$filePath', data_acq_midgar='$midgarDate', venduto='1'
WHERE nome = '".$nameAnimCat."';";

$conn->query($sql);
$conn->close();