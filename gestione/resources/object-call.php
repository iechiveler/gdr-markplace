<?php
require_once '../../includes/dbh.inc.php';

$category = trim(file_get_contents("php://input"));

$sql = "SELECT nome, id_categoria FROM oggettistica_catalogo WHERE id_categoria = '". $category ."';";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

    echo '<option value="' . $row["nome"] . '">' . $row["nome"] . '</option>';
    
};

$conn->close();
