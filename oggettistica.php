<?php
    include_once 'header.php';
?>


<?php 

    include './includes/dbh.inc.php';

    $sql = "SELECT oggettistica_categoria.id_categoria, oggettistica_categoria.nome_categoria
    FROM oggettistica_categoria
    ORDER BY oggettistica_categoria.nome_categoria ASC;";
    $result = $conn->query($sql);
?>
    <div class="container my-5">
        <div class="btn-group d-flex flex-wrap">
            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo '<a href="./oggettistica.php?id=' . $row["id_categoria"] . '" class="btn btn-dark">' . $row["nome_categoria"] . '</a>';
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
                $conn->close();
            ?>
        </div>
    </div>



<?php 

    include './includes/dbh.inc.php';

    if(isset($_GET["id"])){
      $val = $_GET["id"];

    $sql = "SELECT oggettistica_catalogo.nome, oggettistica_catalogo.url_img, oggettistica_catalogo.prezzo, oggettistica_catalogo.ricetta, oggettistica_categoria.nome_categoria 
            FROM oggettistica_catalogo
            LEFT JOIN oggettistica_categoria ON oggettistica_categoria.id_categoria = oggettistica_catalogo.id_categoria
            WHERE oggettistica_categoria.id_categoria = $val
            ORDER BY oggettistica_catalogo.nome ASC;";
    $result = $conn->query($sql);
    
    echo '<div class="container mt-4">
    <div class="row">';

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<div class="col-sm">
                    <div class="card mb-4" style="width: 18rem;">
                    <img src="' . $row["url_img"] . '" class="card-img-top" alt="' . $row["nome_categoria"] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["nome"] . '</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Prezzo: '. $row["prezzo"] . ' Axii</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Ricetta: '. $row["ricetta"] . '</h6>
                        <p class="card-text"></p>
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
?>

<?php
    include_once 'footer.php';
?>