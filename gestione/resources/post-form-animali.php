<?php

if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit();
}


$sql = "SELECT animali_categoria.nome AS nome_categoria, id_categoria
    FROM animali_categoria;";
$result = $conn->query($sql);

echo '<div class="container mt-5 w-50">';
echo '<form action="./resources/check-form-animali.php" method="post">';
echo '<p class="text-light">Gestore per la creazione dei certificati per gli Animali</p>';

echo '<div class="input-group mb-3">';
echo '<input type="text" class="form-control" name="DataMidgar" placeholder="Data di Midgar" required>';
echo '</div>';

echo '<div class="input-group mb-3">';
echo '<input type="text" class="form-control" name="NomeAcquirente" placeholder="Nome acquirente" required>';
echo '</div>';

echo '<div class="input-group mb-3">';
echo '<input type="text" class="form-control" name="NomeDestinatario" placeholder="Nome destinatario" required>';
echo '</div>';

echo '<div class="input-group mb-3">';
echo '<input type="text" class="form-control" name="NomeAnimaleCatalogo" placeholder="Nome animale da catalogo" required>';
echo '</div>';

echo '<div class="input-group mb-3">';
echo '<input type="text" class="form-control" name="NomeAnimale" placeholder="Nome animale scelto dall&#39; acquirente" required>';
echo '</div>';

echo '<div class="input-group mb-3">';
echo '<span class="input-group-text">Inserire i dettagli <br> dell&#39animale</span>';
echo '<textarea class="form-control" name="DettagliAnimale" required></textarea>';
echo '</div>';

echo '<div class="input-group mb-3">';
echo '<input type="text" class="form-control" name="EtàAnimale" placeholder="Età" required>';
echo '</div>';

echo ' <select class="form-select mb-3" name="SessoAnimale">';
echo '<option selected>Scegli il sesso ...</option>';
echo '<option value="Maschio">Maschio</option>';
echo '<option value="Femmina">Femmina</option>';
echo '</select>';


echo ' <select class="form-select mb-3 category-select" name="sceltcate" id="scelcate" required>';
echo '<option selected id="0">Scegli la categoria animale ...</option>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo '<option value="' . $row["id_categoria"] . '">' . $row["nome_categoria"] . '</option>';
    }
}
echo '</select>';

echo ' <select class="form-select mb-3 race-select" name="RazzaAnimale" id="races">';
echo '<option selected>Scegli la razza animale ...</option>';


echo '</select>';

echo '<div class="form-check">';
echo '<input class="form-check-input" type="checkbox" id="dedicaon" name="dedicasi" onclick="displayarea()">';
echo '<label class="form-check-label text-light" for="dedicaon">Dedica?</label>';
echo '</div>';

echo '<div class="input-group mb-3">';
echo '<textarea class="form-control" name="dedicatesto" id="deditext" style="display: none" placeholder="Inserire dedica"></textarea>';
echo '</div>';

echo '<button type="submit" name="submit" class="btn btn-primary">Genera certificato</button>';
echo '</form>';
echo '</div>';

// conservare
echo '<script src="./resources/app.js"></script>';
$conn->close();

if (isset($_GET["res"])) {
    echo '<div class="container mt-5 w-50">
                    <div>
                        <p class="text-light">Nuovo certificato creato:</p>
                        <a href="' . $_GET["res"] . '" target="_blank">Link Certificato</a>
                    </div>
                </div>';
}
