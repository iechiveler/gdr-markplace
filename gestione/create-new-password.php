<?php
include_once 'header.php';
?>

<div class="container">

    <?php
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if (empty($selector) || empty($validator)) {
        echo "Impossibile convalidare la tua richiesta!";
    } else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
    ?>

    <form action="./includes/reset-password.inc.php" method="POST" class="py-4 px-4 w-50">
        <div class="mb-3">
            <h5 class="text-light"></h5>
            <p class="text-light">Ti sarà inviata un'email con le istruzioni per il cambio password</p>
            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
            <input type="hidden" name="validator" value="<?php echo $validator; ?>">
            <input type="password" class="form-control" name="pwd" placeholder="Inserisci nuova password">
            <input type="password" class="form-control" name="pwd-ripeti" placeholder="Ripeti nuova password">
        </div>
        <button type="submit" class="btn btn-primary" name="passwd-change-submit">Cambia password</button>
    </form>

    <?php
        }
    }

    ?>

</div>

<?php
include_once 'footer.php';
?>