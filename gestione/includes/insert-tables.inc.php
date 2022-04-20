<?php

$id_catalogo = $row["id_catalogo"];

$sql =  "INSERT INTO oggettistica_certificato(id_catalogo, acquirente, destinatario, data_acqui_midgar, dedica, url_path) VALUES (' $id_catalogo','$nameAcqui','$nameDest','$midgarDate','$dedText','$filePath');";

$conn->query($sql);
$conn->close();