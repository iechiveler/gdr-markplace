<?php
include 'header.php';
include './includes/dbh.inc.php';

$sql = "SELECT animali_categoria.id_categoria, animali_categoria.nome
    FROM animali_categoria
    ORDER BY animali_categoria.id_categoria ASC;";
$result = $conn->query($sql);
?>
<div class="container my-5">
    <div class="btn-group d-flex flex-wrap">
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<a href="./animali.php?id=' . $row["id_categoria"] . '" class="btn btn-dark">' . $row["nome"] . '</a>';
            }
        } else {
            echo '<div class="container my-5 align-items-center">
                    <div class="row mx-auto">
                        <div class="alert alert-danger" role="alert">
                            Sito in costruzione.
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>

<?php

if (isset($_GET["id"])) {
    $val = $_GET["id"];

    $sql = "SELECT animali_catalogo.nome, animali_catalogo.url_img, animali_catalogo.prezzo, animali_catalogo.venduto, animali_categoria.ricetta
            FROM animali_catalogo
            LEFT JOIN animali_categoria ON animali_categoria.id_categoria = animali_catalogo.id_categoria
            WHERE animali_catalogo.id_categoria = $val AND animali_catalogo.venduto = 0
            ORDER BY animali_catalogo.nome ASC;";
    $result = $conn->query($sql);

    echo '<div class="container mt-4">
    <div class="row">';

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-sm">
                    <div class="card mb-4" style="width: 18rem;">
                    <img src="' . $row["url_img"] . '" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["nome"] . '</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Prezzo: ' . $row["prezzo"] . ' Axii</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Ricetta: ' . $row["ricetta"] . '</h6>
                    </div>
                    </div>
                    </div>';
        }
    } else {
        echo '
            <div class="row mx-auto">
                <div class="alert alert-danger" role="alert">Catalogo in allestimento.</div>        
            </div>';
    }
    $conn->close();

    echo '</div>
        </div>';
}

include 'footer.php';
?>