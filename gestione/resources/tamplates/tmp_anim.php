<?php
$urlimg = $row[0];
$race = $array[0];
$details = $row[1];

if ($dedText |= NULL) {
    $var1 = '<div id="dedicar">
    <p>'. $dedText .'</p>
</div>
<div class="divisori">
    <img src="https://oltreilfiume.altervista.org/imgcertificati/divisori/div1.png" alt="DIVISORE">
</div>';
};


$fileRaw = <<<EOF
    
    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/form/mainl.css">
        <title>Allevamento "Oltre il Fiume" - $nameDest</title>
        <link rel="icon" href="/immagini/topbg/Iconablu.ico">
    </head>
    <body>
        <div id="container">
            <div id="top-img">
                <img src="https://oltreilfiume.altervista.org/imgcertificati/top/top_cavallopatina1.png" alt="TOP">
            </div>
            <div class="divisori">
                <img src="https://oltreilfiume.altervista.org/imgcertificati/divisori/div1.png" alt="DIVISORE">
            </div>
            <div id="box-dest">
                <div id="data">
                    <p>• • • $midgarDate • • •</p>
                </div>
                <div id="attcertf">
                    <p>L&#39; Allevamento "Oltre il Fiume è lieto di certificare a </p>
                    <h1>$nameDest</h1>
                    <p>La proprietà di questo splendido animale</p>
                </div>
            </div>
            <div class="divisori">
                <img src="https://oltreilfiume.altervista.org/imgcertificati/divisori/div1.png" alt="DIVISORE">
            </div>
            <div id="nomeanimale">
                <h1>• • • $nameAnim • • •</h1>
            </div>
            <div id="immaginec">
                <img src="$urlimg" alt="ImmagineAnimale">
            </div>
            <div class="divisori">
                <img src="https://oltreilfiume.altervista.org/imgcertificati/divisori/div1.png" alt="DIVISORE">
            </div>
            <div id="h1info">
                <h1>Qualcosa in più su questo animale</h1>
            </div>
            <div id="h1dettagli">
                <p>$detAnim</p>
            </div>
            <div id="h1RES">
                <ul>
                    <li><b>Razza</b>: $race</li>
                    <li><b>Età</b>: $ageAnim</li>
                    <li><b>Sesso</b>: $sexAnim</li>
                </ul>
            </div>
            <div id="h2info">
                <h1>I dettagli della Razza</h1>
            </div>
            <div id="h2dettagli">
                <p>$details</p>
            </div>
            <div class="divisori">
                <img src="https://oltreilfiume.altervista.org/imgcertificati/divisori/div1.png" alt="DIVISORE">
            </div>
            $var1
            <div id="firma">
                <a href="https://oltreilfiume.altervista.org">Raven Bain<br>Oltre il Fiume</a>
            </div>
            <div class="divisori">
                <img src="https://oltreilfiume.altervista.org/imgcertificati/divisori/div1.png" alt="DIVISORE">
            </div>
            <div id="footer">
                <p>Tutto il materiale presente su questo sito non è a scopo di lucro, viene esclusivamente utilizzato all&#39;interno di un Gioco di Ruolo Play by Chat. <br><b>Midgar</b></p>
                <a href="https://midgar.land" target="_blank"><img src="https://oltreilfiume.altervista.org/immagini/midgar_logo.png" alt="LOGO"></a>
            </div>
        </div>
    </body>
    </html>
EOF;
