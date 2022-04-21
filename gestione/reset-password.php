<?php
include_once 'header.php';
?>

<div class="container w-50">
    <form action="./includes/pass-request.inc.php" method="POST" class="py-4 px-4">
        <div class="mb-3">
            <h5 class="text-light">Recupera password</h5>
            <p class="text-light">Ti sarà inviata un'email con le istruzioni per il cambio password</p>
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <button type="submit" class="btn btn-primary" name="passwd-request-submit">Submit</button>
    </form>

    <?php
    if (isset($GET["reset"])) {
        if ($GET["reset"] == "completato") {
            echo '<p>Controlla la tua email</p>';
        }
    }
    ?>

</div>

<?php
include_once 'footer.php';
?>