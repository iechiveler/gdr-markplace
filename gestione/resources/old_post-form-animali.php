<?php

if(isset($_SESSION["username"])) {


    $sql = "SELECT animali_categoria.nome AS nome_categoria 
    FROM animali_categoria;";
    $result = $conn->query($sql);
       
    echo '<div class="container mt-5 w-50">';
        echo'<form action="./check-form-animali.php" method="post">';
            echo '<p class="text-light">Gestore per la creazione dei certificati per gli Animali</p>';

            echo '<div class="input-group mb-3">';
            echo '<input type="text" class="form-control" name="DataMidgar" placeholder="Data di Midgar" required>';
            echo '</div>';

            echo '<div class="input-group mb-3">';
            echo '<input type="text" class="form-control" name="NomeDestinatario" placeholder="Nome destinatario" required>';
            echo '</div>';

            echo '<div class="input-group mb-3">';
            echo '<input type="text" class="form-control" name="NomeAnimale" placeholder="Nome animale" required>';
            echo '</div>';

            echo '<div class="input-group mb-3">';
            echo '<input type="url" class="form-control" name="ImmagineAnimale" placeholder="Inserire il link dell&#39immagine" required>';
            echo '</div>';

            echo '<div class="input-group mb-3">';
            echo '<span class="input-group-text">Inserire i dettagli <br> dell&#39animale</span>';
            echo '<textarea class="form-control" name="DettagliAnimale" required></textarea>';
            echo '</div>';

            echo '<div class="input-group mb-3">';
            echo '<input type="text" class="form-control" name="EtàAnimale" placeholder="Età" required>';
            echo '</div>';

            echo' <select class="form-select mb-3" name="SessoAnimale">';
            echo '<option selected>Scegli il sesso ...</option>';
            echo '<option value="Maschio">Maschio</option>';
            echo '<option value="Femmina">Femmina</option>';
            echo '</select>';


            echo' <select class="form-select mb-3" name="sceltcate" id="scelcate" required onchange="displayrazza()">';
            echo '<option selected id="0">Scegli il categoria animale ...</option>';
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    echo '<option value="' . $row["nome_categoria"] . '">' . $row["nome_categoria"] . '</option>';
                    
                }
            }
            echo '</select>';
            
           
                

                echo' <select class="form-select mb-3" name="RazzaAnimale" id="races" disabled>';
                echo '<option selected>Scegli la razza animale ...</option>';

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row["nome_razza"] . '">' . $row["nome_razza"] . '</option>';
                        
                    }
                }
            

            $conn->close();
      
            echo '</select>';
            
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="checkbox" id="dedicaon" name="dedicasi" onclick="displayarea()">';
            echo '<label class="form-check-label text-light" for="dedicaon">Dedica?</label>';
            echo '</div>';

            echo '<div class="input-group mb-3">';
            echo '<textarea class="form-control" name="dedicatesto" id="deditext" style="display: none" placeholder="Inserire dedica"></textarea>';
            echo '</div>';

            echo '<div class="input-group mb-3">';
            echo '<input type="text" class="form-control" name="LinkBuilder" placeholder="pg_razzaXX.html" required>';
            echo '</div>';

            echo '<button type="submit" class="btn btn-primary">Genera certificato</button>';
        echo '</form>';
    echo '</div>';

    // conservare
    echo '<script src="./resources/app.js"></script>';
    
}
