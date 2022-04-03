<?php
    include_once './header.php';

    if(isset($_SESSION["username"])) {
        header("Location: ./dashboard.php");
    }
?>

    <div class="container w-50">
        <form action="./includes/login.inc.php" method="POST" class="py-4 px-4">
        <h5 class="text-light">Login</h5>
            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username/Email...">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="passwd" placeholder="Password...">
                <a href="./reset-password.php" >Password dimenticata?</a>
                <?php
                    if(isset($_GET["newpwd"])) {
                        if($_GET["newpwd"] == "passwordcambiata") {
                            echo '<p class="text-danger">Password cambiata correttamente!</p>';
                        }
                    }
                    if(isset($_GET["session"])) {
                        if($_GET["session"] == "disconnected") {
                            echo '<p class="text-danger">Disconnesso</p>';
                        }
                    }
                    if(isset($_GET["errore"])) {
                        if($_GET["errore"] == "valorimancanti") {
                            echo '<p class="text-danger">Inserisci correttamente i valori richiesti</p>';
                        }
                    }
                ?>

            </div>
            <button type="submit" class="btn btn-primary" name="login-submit">Submit</button>
        </form>
    </div>
    
<?php
    include_once './footer.php';
?>