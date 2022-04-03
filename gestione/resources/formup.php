<?php 
if (isset($_POST['submit'])) {
	//input del file tramite html
	$file = $_FILES['file'];
	//input da html nome abilitato
	$nomiAbilitati = $_POST['nome_individuo'];
	//$arrayAbilitati = array('abilitati/omedici');

	//scomposizione del file inviao
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileEXT = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileEXT));
	//file abilitati
	$allowed = array('html', 'htm');
	//utenti abiltati
	$utenti = array('Veleran', 'Raven', 'Francis', 'Nerys', 'Aiden');


	//dichiaro controllo sui nomi abilitati
	if (in_array($nomiAbilitati, $utenti)) {
		//dichiaro che se non esiste la cartella venga creata altrimenti non fare niente
		if (file_exists('giocate/'.strtolower($nomiAbilitati))) {
			} else {
				mkdir('giocate/'.strtolower($nomiAbilitati));
				}
				//dichiaro che gli utenti abilitati ad operare possono salvare la giocata nel path indicato
		if (in_array($fileActualExt, $allowed)) {
			//effettuo un controllo sugli errori file
			if ($fileError === 0) {
				//dichiaro la grandezza massima consentita
				if ($fileSize < 700000) {
					//path destinazione inserendo i nomi tutti i lower case + nome file
				$fileDestination = 'giocate/'.strtolower($nomiAbilitati).'/'.strtolower($nomiAbilitati)."-".$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);
				//echo "upload completato";
				} else {
				echo "Il file che si tenta di inviare è troppo grande";
				echo "<br>";
				}
			} else {
				echo "Il file che si tenta di inviare contiene degli errori";
				echo "<br>";
			}
		} else {
			echo "Il file non è stato accettato";
			echo "<br>";
		}
	} else {
		echo "Hai sbagliato ad inserire il nome";
		echo "<br>";
	}
}
 ?>
<html>
	<head>
	<link rel="stylesheet" href="stylef.css">
	</head>
	<body>
		<div class="container-link">
			<h2>Link alla giocata</h2>
			<?php echo"<a id='myInput' style='text-decoration: none; color: #e5c100; font-size: 20px'  href='$fileDestination' target='_blank'>Clicca qui per visualizzare la giocata</a>"?>
			<br>
			<input type="hdden" id="clipboard_input" value="<?php echo $fileDestination; ?>">	
			<button class='bottone-copia' onclick="myFunction()">Copia Link</button>
		</div>
	</body>
	<script>
			function myFunction() {
			/* Get the text field */
			var copyText = document.getElementById("clipboard_input");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /*For mobile devices*/

			/* Copy the text inside the text field */
			document.execCommand("copy");

			/* Alert the copied text */
			alert("Link Copiato");
			}
		</script>
</html>