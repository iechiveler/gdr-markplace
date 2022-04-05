<?php

if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit();
};
?>

<!-- Fill with a form for ceertificate creation -->