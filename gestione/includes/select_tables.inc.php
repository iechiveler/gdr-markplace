<?php

if(!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit();
}

include '../../includes/dbh.inc.php';

    $result = mysqli_query($conn, "SELECT animali_catalogo.url_img, animali_razza.descrizione AS DRazza 
    FROM animali_catalogo
    LEFT JOIN animali_razza ON animali_razza.id_razza = animali_catalogo.id_razza
    WHERE animali_catalogo.nome = 'Fiamma';");
    $row = mysqli_fetch_row($result);