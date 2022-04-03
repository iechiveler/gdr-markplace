<?php
    if(!isset($_SESSION["username"])) {
        header("Location: ../login.php");
        exit();
    }

    $sql = "SELECT SUM(animali_catalogo.prezzo)
    FROM animali_catalogo
    WHERE animali_catalogo.venduto = 1;";
    
    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $rawtotalsum = $row['SUM(animali_catalogo.prezzo)'];

    $totalsum = ($rawtotalsum*95)/100;
