<?php

function userexists($conn, $username) {
    $sql = "SELECT * FROM utente WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?errore=errore101");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emptyInputLogin($username, $password) {
    
    if(empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password) {
    $userexists = userexists($conn, $username);
    if($userexists === false) {
        header("Location: ../login.php?errore=loginerrato");
        exit();
    }

    $passwdHashed = $userexists["password"];
    $checkpasswd = password_verify($password, $passwdHashed);

    if($checkpasswd === false) {
        header("Location: ../login.php?errore=loginerrato1");
        exit();
    } else if($checkpasswd === true) {
        session_start();
        $_SESSION["username"] = $userexists["username"];
        $_SESSION["login_idle_timestamp"] = time();
        header("Location: ../dashboard.php");
        exit();
    }
}