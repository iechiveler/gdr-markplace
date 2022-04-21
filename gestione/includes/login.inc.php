<?php

if (isset($_POST["login-submit"])) {
    $username = $_POST["username"];
    $password = $_POST["passwd"];

    require_once '../../includes/dbh.inc.php';
    require './functions.inc.php';

    if (emptyInputLogin($username, $password) !== false) {
        header("Location: ../login.php?errore=valorimancanti");
        exit();
    }

    loginUser($conn, $username, $password);
} else {
    header("Location: ../login.php");
    exit();
}
