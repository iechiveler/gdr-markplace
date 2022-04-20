<?php

$result = mysqli_query($conn, "SELECT descrizione, id_catalogo, url_img FROM oggettistica_catalogo WHERE nome = '$objectSelection';");

$row = mysqli_fetch_assoc($result);