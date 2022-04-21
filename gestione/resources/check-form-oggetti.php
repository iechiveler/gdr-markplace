<?php

include '../../includes/dbh.inc.php';

if (isset($_POST["submit"])) {
    include '../includes/functions.inc.php';
    //Load inputs
    $midgarDate = $_POST["DataMidgar"];
    $nameAcqui = $_POST["NomeAcquirente"];
    $nameDest = $_POST["NomeDestinatario"];
    $objectSelection = $_POST["objSel"];
    $dedText = $_POST["dedicatesto"];

    // Generate filename.html base on destname
    preg_match('/^\S+/', $nameDest, $matches);
    $ext = "html";
    $fileNameU = strtolower($matches[0]);
    $fileName = $fileNameU . '_' . $objectSelection . '.' . $ext;

    $path = '../../certificati/';
    // Destination
    $fileDest = $path . $fileName;

    // Path link
    $filePath = 'https://oltreilfiume.altervista.org/' . $fileDest;

    // Adding file to specified path
    $fileTemp = fopen($fileDest, 'w') or die('Impossibile creare il file');

    // Load of template for update tables
    selectTableObj($objectSelection);
    insertTableObj($row, $id_catalogo, $nameAcqui, $nameDest, $midgarDate, $dedText, $filePath);



    include './tamplates/tmp-obj.php';

    // Scrittura sul file 
    fwrite($fileTemp, $fileRaw);
    // Chiusura del file
    fclose($fileTemp);

    header("Location: ../dashboard.php?page=ccertogg&res=$filePath");
    exit();
};
