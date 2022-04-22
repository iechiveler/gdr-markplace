<?php
include './header.php';
include '../includes/dbh.inc.php';
?>

<?php
if (!isset($_SESSION["username"])) {
    header("Location: ./login.php");
    exit();
};

if (isset($_SESSION["username"])) {

    if (isset($_GET["page"])) {
        if ($_GET["page"] == "ccertanim") {
            include './resources/post-form-animali.php';
        }
        if ($_GET["page"] == "ccertogg") {
            include './resources/post-form-oggettistica.php';
        }
        if ($_GET["page"] == "searchcert") {
            include './resources/search-anim-cert.php';
        }
    } else {
        if ($_SESSION["username"] == "raven") {
            include './includes/functions.inc.php';
?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Categoria</th>
                        <th scope="col">Guadagni</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Animali:</td>
                        <td><?php moneyamount($conn) ?> Axii</td>
                    </tr>
                    <tr>
                        <td>Oggetti:</td>
                        <td><?php moneyamountobj($conn) ?> Axii</td>
                    </tr>
                    <tr>
                        <td>Totale:</td>
                        <td><?php totalmoney($totalsum1, $totalsum2) ?> Axii</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            
        </div>
        <div class="col">
            
        </div>
    </div>
</div>
<?php
        };
    };
};
?>

<?php
include './footer.php';
?>