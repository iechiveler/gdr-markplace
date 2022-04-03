<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oltre il fiume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100" style="background-color: #08121c;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../index.php">Torna alla bottega</a>
                    <a class="nav-link" href="./login.php">Dashboard</a>
                    <?php
                    if (isset($_SESSION["username"])) {
                    ?>
                        <div class="dropdown">
                            <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Gestione</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="./dashboard.php?page=ccertanim">Crea certificati | Animali</a></li>
                                <li><a class="dropdown-item" href="./dashboard.php?page=ccertogg">Crea certificati | Oggettistica</a></li>
                                <li><a class="dropdown-item" href="./dashboard.php?page=searchcert">Cerca Certificati</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </div>
                        <a class="nav-link position-absolute end-0 me-3 btn btn-danger text-light" href="./includes/logout.inc.php">Logout</a>
                    <?php
                    }
                    if (!isset($_SESSION["username"])) {
                        echo '<a class="nav-link position-absolute end-0 me-3 btn btn-primary text-light" href="./login.php">Login</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>