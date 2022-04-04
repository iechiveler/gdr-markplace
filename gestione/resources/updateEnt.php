<?php

if (!isset($_SESSION["username"])) {
  header("Location: ../login.php");
  exit();
}


$sql = "UPDATE animali_catalogo SET venduto='$sell', prezzo='$money' WHERE nome='$name';";
$result = $conn->query($sql) or die($conn->error);