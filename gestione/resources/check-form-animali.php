<?php


if (isset($_POST["submit"])) {
    include '../includes/functions.inc.php';
    //Load inputs
    $midgarDate = $_POST["DataMidgar"];
    $nameAcqui = $_POST["NomeAcquirente"];
    $nameDest = $_POST["NomeDestinatario"];
    $nameAnimCat = $_POST["NomeAnimaleCatalogo"];
    $nameAnim = $_POST["NomeAnimale"];
    $detAnim = $_POST["DettagliAnimale"];
    $ageAnim = $_POST["EtàAnimale"];
    $sexAnim = $_POST["SessoAnimale"];
    $raceAnim = $_POST["RazzaAnimale"];
    $dedText = $_POST["dedicatesto"];

    // Data explode of $raceAnim using pipe as delimitator
    $array = explode("|", $raceAnim, 2);
    $nRace = $array[1];

    // Data trim for $sexAnim
    preg_match('/^./', $sexAnim, $sexMatch);
    $newSex = $sexMatch[0];

    // Generate filename.html base on destname
    preg_match('/^\S+/', $nameDest, $matches);
    $ext = "html";
    $fileNameU = strtolower($matches[0]);
    $fileName = $fileNameU . '_' . $nameAnim . '.' . $ext;

    $path = '../../certificati/';
    // Destination
    $fileDest = $path . $fileName;

    // Path link
    $filePath = 'https://oltreilfiume.altervista.org/' . $fileDest;

    // Adding file to specified path
    $fileTemp = fopen($fileDest, 'w') or die('Impossibile creare il file');

    // Load of template for update tables
    $values = array($nRace, $nameAcqui, $nameAnim, $nameDest, $newSex, $ageAnim, $filePath, $midgarDate, $nameAnimCat);

    selectTableAnimal($nameAnimCat);
    updateTableAnimal($values);

    include './tamplates/tmp_anim.php';

    // Scrittura sul file 
    fwrite($fileTemp, $fileRaw);
    // Chiusura del file
    fclose($fileTemp);

    header("Location: ../dashboard.php?page=ccertanim&res=$filePath");
    exit();
};
