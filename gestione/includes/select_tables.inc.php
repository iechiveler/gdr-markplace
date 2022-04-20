<?php

$result = mysqli_query($conn, "SELECT animali_catalogo.url_img, animali_razza.descrizione AS DRazza 
    FROM animali_catalogo
    LEFT JOIN animali_razza ON animali_razza.id_razza = animali_catalogo.id_razza
    WHERE animali_catalogo.nome = '$nameAnimCat';");
$row = mysqli_fetch_row($result);
