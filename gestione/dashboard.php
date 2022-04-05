<?php
include_once './header.php';
include '../includes/dbh.inc.php';
?>

    <?php
    if (!isset($_SESSION["username"])) {
        header("Location: ./login.php");
        exit();
    }

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
                include './includes/m_amount.inc.php';
                echo '
                        <div class="container mt-5 position-relative">
                            <p class="text-light position-absolute top-0 start-0">Guadagni: ' . $totalsum . ' Axii</p>
                        </div>
                    ';
            }
        }
    }
    ?>
    
<?php
include_once './footer.php';
?>


