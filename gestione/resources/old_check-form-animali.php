<?php
if(isset($_POST['submit'])) {
    // Metto in memoria il nome del file
    $fileName = $_POST['LinkBuilder'];
    // Metto in memoria tutte variabili
    $dataMidgar = $_POST['DataMidgar'];
    $nomeDest = $_POST['NomeDestinatario'];
    $nomeAnim = $_POST['NomeAnimale'];
    $urlImg = $_POST['ImmagineAnimale'];
    $dettAnim = $_POST['DettagliAnimale'];
    $razzaAni = $_POST['RazzaAnimale'];
    $etaAnim = $_POST['EtàAnimale'];
    $sessoAnim = $_POST['SessoAnimale'];
    // $checkb = $_POST['dedicasi'] ? $_POST['dedicasi'] : null;
    $dedi = $_POST['dedicatesto'];

    // Dichiaro il path di destinazione
    $fileDest = '../certificati/'.$fileName;
    // Dichiaro il path finale per la restituzione del link
    $filePath = 'https://oltreilfiume.altervista.org/'.$fileDest;

    // Regex per controllo estensione del file certificato
    $regex = '/^[a-zA-Z]+_+[a-zA-Z]+[0-9]+.+\b[html]{4}$/';

    // Controllo dell'esistenza del file nella cartella di destinazione
    if(file_exists($fileDest) || !preg_match($regex, $fileName)){
        echo '<script> document.getElementById("formId").remove()</script>
        <div id="container">
            <div id="box-rev">
                <p>Certificato esistente o il formato del nome è errato.</p>
                <p>Contattare Raven in caso di necessità.</p>
                <button onclick="window.history.back()" style="width: 10%; margin-top: 10px">Indietro</button>
            </div>
        </div>';
    } else {
        // includo l'array di hash
        include 'form-login.inc.php';

        // Controllo dei PIN inseriti dall'utente
        if (password_verify($pinInput, $passwdhash)) {
            
            // Creazione del file nel path designato
            $fileTemp = fopen('../certificati/'.$fileName, 'w') or die ('Impossibile creare il file');
            
            // Controllo sulla checkbox 
            if ($checkb == true) {
                include 'includes/form-dedica.inc.php';

                // Scrittura sul file 
                fwrite($fileTemp, $fileRaw);
                // Chiusura del file
                fclose($fileTemp);

                echo '<script> document.getElementById("formId").remove()</script>
                    <div id="container">
                        <div id="box-rev">
                            <p>Certificato creato correttamente.</p>
                            <p>Ecco il Link:</p>
                            <a href="' . $filePath . '" target="_blank">Link Certificato</a>
                            <br>
                            <button onclick="window.history.back()" style="width: 10%; margin-top: 10px">Indietro</button>
                        </div>
                    </div>';
            } else {
                include 'includes/form-nodedica.inc.php';

                // Scrittura sul file 
                fwrite($fileTemp, $fileRaw);
                // Chiusura del file
                fclose($fileTemp);

                echo '<script> document.getElementById("formId").remove()</script>
                    <div id="container">
                        <div id="box-rev">
                            <p>Certificato creato correttamente.</p>
                            <p>Ecco il Link:</p>
                            <a href="' . $filePath . '" target="_blank">Link Certificato</a>
                            <br>
                            <button onclick="window.history.back()" style="width: 10%; margin-top: 10px">Indietro</button>
                        </div>
                    </div>';
            }
        } else {
            echo '<script> document.getElementById("formId").remove()</script>
                <div id="container">
                    <div id="box-rev">
                        <p>Pin errato, per non perdere il documento torna indietro.</p>
                        <button onclick="window.history.back()" style="width: 10%">Indietro</button>
                    </div>
                </div>';
        }
    }
}  
?>