<?php

if (!isset($_SESSION["username"])) {
        header("Location: ../login.php");
        exit();
};

include '../../includes/dbh.inc.php';

$sql =  "INSERT INTO oggettistica_certificato(id_catalogo, acquirente, destinatario, data_acqui_midgar, dedica, url_path) VALUES ('.  $id_catalogo.','. $nameAcqui .','. $nameDest .','. $midgarDate .','. $dedText .','. $fileName .');";

$conn->query($sql);
$conn->close();