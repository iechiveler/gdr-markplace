<?php

if(!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit();
};

if(isset($_POST["submit"])){
    //Load inputs
    $midgarDate = $_POST["DataMidgar"];
    $nameAcqui = $_POST["NomeAcquirente"];
    $nameDest = $_POST["NomeDestinatario"];
    $objectSelection = $_POST["objSel"];
    $dedText = $_POST["dedicatesto"];

    // Load of template for update tables
    include '../includes/insert-tables.inc.php';
    include '../includes/select_tables.inc.php';
    
    // Generate filename.html base on destname
    preg_match('/^\S+/', $nameDest, $matches);
    $ext = "html";
    $fileNameU = strtolower($matches[0]);
    $fileName = $fileNameU. '_' .$nameAnim.'.'.$ext;

    $path = '../../../certificati/'; 
    // Destination
    $fileDest = $path.$fileName;
    
    // Path link
    $filePath = 'https://oltreilfiume.altervista.org/'.$fileDest;

    // Adding file to specified path
    $fileTemp = fopen($fileDest, 'w') or die ('Impossibile creare il file');

    
    
    // Check on dedi checkbox
    if ($dedText != NULL) {
        include './tamplates/tmp_anim_dedi.php';

        // Scrittura sul file 
        fwrite($fileTemp, $fileRaw);
        // Chiusura del file
        fclose($fileTemp);

        header("Location: ../dashboard.php?page=ccertanim&res=$filePath");
        exit();

    } else {
        include './tamplates/tmp_anim_no_dedi.php';

        // Scrittura sul file 
        fwrite($fileTemp, $fileRaw);
        // Chiusura del file
        fclose($fileTemp);

        header("Location: ../dashboard.php?page=ccertanim&res=$filePath");
        exit();
    }; 
};
