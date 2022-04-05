<?php
require_once '../../includes/dbh.inc.php';

$nameSrc = trim(file_get_contents("php://input"));
$name_opt = null;

$sql = "SELECT nome, acquirente, destinatario, url_path, venduto, prezzo FROM animali_catalogo WHERE nome = '". $nameSrc ."';";
$result = $conn->query($sql) or die($conn->error);

// echo $nameSrc;

while($row = $result->fetch_assoc()) {

    $name_opt = '<p class="text-light">'. $row["nome"] . $row["acquirente"] . $row["destinatario"] . $row["url_path"] . $row["venduto"] . $row["prezzo"] .'';
    
}

echo $name_opt;

$conn->close();
