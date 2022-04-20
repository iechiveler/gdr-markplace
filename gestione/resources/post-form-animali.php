<?php

if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit();
};

$sql = "SELECT nome, id_categoria
    FROM animali_categoria;";
$result = $conn->query($sql);

?>

<div class="container mt-5 w-50">
    <form action="./resources/check-form-animali.php" method="post">
        <p class="text-light">Gestore per la creazione dei certificati per gli Animali</p>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="DataMidgar" placeholder="Data di Midgar" required>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="NomeAcquirente" placeholder="Nome acquirente" required>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="NomeDestinatario" placeholder="Nome destinatario" required>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="NomeAnimaleCatalogo" placeholder="Nome animale da catalogo" required>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="NomeAnimale" placeholder="Nome animale scelto dall&#39; acquirente" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Inserire i dettagli <br> dell&#39animale</span>
            <textarea class="form-control" name="DettagliAnimale" required></textarea>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="EtàAnimale" placeholder="Età" required>
        </div>

        <select class="form-select mb-3" name="SessoAnimale">
            <option selected>Scegli il sesso ...</option>
            <option value="Maschio">Maschio</option>
            <option value="Femmina">Femmina</option>
        </select>

        <select onchange="scelCategory(event)" class="form-select mb-3 category-select" name="selcate" required>
            <option selected id="0">Scegli la categoria animale...</option>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo '<option value="' . $row["id_categoria"] . '">' . $row["nome"] . '</option>';
                };
            };
            ?>
        </select>
        <select class="form-select mb-3 race-select" name="RazzaAnimale" id="races">
            <option selected>Scegli la razza animale...</option>
        </select>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="dedicaon" name="dedicasi" onclick="displayarea()">
            <label class="form-check-label text-light" for="dedicaon">Dedica?</label>
        </div>
        <div class="input-group mb-3">
            <textarea class="form-control" name="dedicatesto" id="deditext" style="display: none" placeholder="Inserire dedica"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Genera certificato</button>
    </form>
</div>
<script src="./resources/app.js"></script>

<?php
$conn->close();

if (isset($_GET["res"])) {
    echo '<div class="container mt-5 w-50">
            <div>
                <p class="text-light">Nuovo certificato creato:</p>
                <a href="' . $_GET["res"] . '" target="_blank">Link Certificato</a>
            </div>
        </div>';
};
