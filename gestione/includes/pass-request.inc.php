<?php

    if(isset($_POST["passwd-request-submit"])) {

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "www.oltreilfiume.altervista.org/gestione/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

        $expires = date("U") + 1800;

        require '../../includes/dbh.inc.php';

        $useremail = $_POST["email"];

        $sql = "DELETE FROM reset_pwd WHERE email_pwdrst=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "errore";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $useremail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO reset_pwd (email_pwdrst, selector_pwdrst, token_pwdrst, expires_pwdrst) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "errore";
            exit();
        } else {
            $hashedtoken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $useremail, $selector, $hashedtoken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        $to = $useremail;

        $subject = 'Ripristina la tua password per gestione oltreilfiume';

        $message = '<p>Abbiamo ricevuto una richiesta di ripristino password. Se non sei stato tu ignora pure questa email.</p>';
        $message .= '<p>Link per il ripristino della password: <br>';
        $message .= '<a href"' . $url . '">' . $url . '</a></p>';

        $headers = "From: oltreilfiume <ravenbain.mid@gmail.com>\r\n";
        $headers .= "Reply-To: ravenbain.mid@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header("Location: ../reset-password.php?reset=completato");

    } else {
        header("Location: ../login.php");
    }