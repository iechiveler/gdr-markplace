<?php

function userexists($conn, $username)
{
    $sql = "SELECT * FROM utente WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?errore=errore101");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emptyInputLogin($username, $password)
{

    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    $userexists = userexists($conn, $username);
    if ($userexists === false) {
        header("Location: ../login.php?errore=loginerrato");
        exit();
    }

    $passwdHashed = $userexists["password"];
    $checkpasswd = password_verify($password, $passwdHashed);

    if ($checkpasswd === false) {
        header("Location: ../login.php?errore=loginerrato1");
        exit();
    } else if ($checkpasswd === true) {
        session_start();
        $_SESSION["username"] = $userexists["username"];
        $_SESSION["login_idle_timestamp"] = time();
        header("Location: ../dashboard.php");
        exit();
    }
}

function moneyamount($conn)
{
    $sql1 = "SELECT SUM(animali_catalogo.prezzo)
    FROM animali_catalogo
    WHERE animali_catalogo.venduto = 1;";

    $result = $conn->query($sql1);

    $row = mysqli_fetch_assoc($result);

    $rawtotalsum = $row['SUM(animali_catalogo.prezzo)'];

    global $totalsum1;

    $totalsum1 = ($rawtotalsum * 95) / 100;

    $totalsum4 = number_format(floatval(($rawtotalsum * 95) / 100));

    echo $totalsum4;
    return;
}

function moneyamountobj($conn)
{
    $sql2 = "SELECT SUM(prezzo)  FROM oggettistica_catalogo LEFT JOIN oggettistica_certificato ON oggettistica_certificato.id_catalogo = oggettistica_catalogo.id_catalogo WHERE oggettistica_certificato.id_certificato IS NOT NULL;";

    $result2 = $conn->query($sql2);

    $row2 = mysqli_fetch_assoc($result2);

    $rawtotalsum2 = $row2['SUM(prezzo)'];

    global $totalsum2;

    $totalsum2 = ($rawtotalsum2 * 95) / 100;


    $totalsum3 = number_format(floatval(($rawtotalsum2 * 95) / 100));

    echo $totalsum3;
    return;
}

function totalmoney($totalsum1, $totalsum2)
{
    $totalmoney = $totalsum1 + $totalsum2;

    echo number_format(floatval($totalmoney));
    return;
}

function searchCertAnim($nameSrc)
{
    include '../../includes/dbh.inc.php';
    global $result;
    $sql = "SELECT nome, acquirente, destinatario, url_path, venduto, prezzo FROM animali_catalogo WHERE nome LIKE '%" . $nameSrc . "%';";
    $result = $conn->query($sql) or die($conn->error);

    return $result;
}

function updateTableAnimal($values)
{
    include '../../includes/dbh.inc.php';

    $pureRace = $values[0];

    $sql = "UPDATE animali_catalogo SET id_razza='$pureRace', nome='$values[2]', acquirente='$values[1]', destinatario='$values[3]', sesso='$values[4]', eta='$values[5]', url_path='$values[6]', data_acq_midgar='$values[7]', venduto='1'
WHERE nome = '" . $values[8] . "';";

    $conn->query($sql);
    return;
}

function selectTableAnimal($nameAnimCat)
{
    include '../../includes/dbh.inc.php';

    global $result;

    $result = mysqli_query($conn, "SELECT animali_catalogo.url_img, animali_razza.descrizione AS DRazza 
    FROM animali_catalogo
    LEFT JOIN animali_razza ON animali_razza.id_razza = animali_catalogo.id_razza
    WHERE animali_catalogo.nome = '$nameAnimCat';");

    return $result;
}

function insertTableObj($row, $id_catalogo, $nameAcqui, $nameDest, $midgarDate, $dedText, $filePath)
{
    include '../../includes/dbh.inc.php';

    $sql =  "INSERT INTO oggettistica_certificato(id_catalogo, acquirente, destinatario, data_acqui_midgar, dedica, url_path) VALUES (' $id_catalogo','$nameAcqui','$nameDest','$midgarDate','$dedText','$filePath');";

    $conn->query($sql);
    return;
}

function selectTableObj($objectSelection)
{
    include '../../includes/dbh.inc.php';

    global $row;
    global $id_catalogo;
    
    $result = mysqli_query($conn, "SELECT descrizione, id_catalogo, url_img FROM oggettistica_catalogo WHERE nome = '$objectSelection';");

    $row = mysqli_fetch_assoc($result);

    $id_catalogo = $row["id_catalogo"];
}
