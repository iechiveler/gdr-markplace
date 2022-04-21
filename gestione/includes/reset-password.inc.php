<?php

if (isset($_POST["passwd-change-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordripeti = $_POST["pwd-ripeti"];

    if (empty($password) || empty($passwordripeti)) {
        header("Location: ../create-new-password.php?newpwd=vuoto");
        exit();
    } else if ($password != $passwordripeti) {
        header("Location: ../create-new-password.php?newpwd=passwordnonuguali");
        exit();
    }

    $currentdate = date("U");

    require '../../includes/dbh.inc.php';

    $sql = "SELECT * FROM reset_pwd WHERE selector_pwdrst = ? AND expires_pwdrst >= $currentdate;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "errore";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Richiesta scaduta 1";
            exit();
        } else {

            $tokenbin = hex2bin($validator);
            $tokencheck = password_verify($tokenbin, $row["token_pwdrst"]);

            if ($tokencheck === false) {
                echo "Richiesta scaduta 2";
                exit();
            } elseif ($tokencheck === true) {

                $tokenemail = $row["email_pwdrst"];

                $sql = "SELECT * FROM utente WHERE email = ?;";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "errore2";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenemail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "Errore db!";
                        exit();
                    } else {

                        $sql = "UPDATE utente SET password = ? WHERE email = ?;";

                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "errore 3";
                            exit();
                        } else {
                            $newpwdhash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newpwdhash, $tokenemail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM reset_pwd WHERE email_pwdrst = ?;";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "Errore update pwd";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenemail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?newpwd=passwordcambiata");
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../index.php");
}
