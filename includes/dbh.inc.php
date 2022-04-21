<?php
$serverName = "localhost";
$dbuserName = "root";
$dbPassword = "";
$dbName = "test";

$conn = mysqli_connect($serverName, $dbuserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connessione fallita: " .  mysqli_connect_error());
}
