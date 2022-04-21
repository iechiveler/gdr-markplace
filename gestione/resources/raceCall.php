<?php
require_once '../../includes/dbh.inc.php';

$category = trim(file_get_contents("php://input"));
$race_options = null;

$sql = "SELECT nome, id_razza FROM animali_razza WHERE id_categoria = " . $category . ";";
$result = $conn->query($sql);
echo $category;
while ($row = $result->fetch_assoc()) {

    $race_options .= '<option value="' . $row["nome"] . '|' . $row["id_razza"] . '">' . $row["nome"] . '</option>';
}

echo $race_options;