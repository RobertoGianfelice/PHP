<html>
<head><title>Registrazione dati</title></head>
<body>
<?php   //dati accesso al db
	include "vars.php";
?>
<H1> Esecuzione del file registrazione</H1><BR>
<?php
	//Apro la sessione php...
	session_start();

# Definizioni costanti di lavoro
define('DIR_IMG', '../Images');

#funzione per verificare la validità del file
function checkFile($fileName) {

  # verifica sul tipo del file
  if ((($_FILES["$fileName"]["type"] == "image/gif")
  || ($_FILES["$fileName"]["type"] == "image/jpeg")
  || ($_FILES["$fileName"]["type"] == "image/png")
  || ($_FILES["$fileName"]["type"] == "image/pjpeg"))
  && ($_FILES["$fileName"]["size"] < 30000000)) {
      # verifica errori di upload
      if ($_FILES["$fileName"]["error"] > 0){
        echo "Return Code: " . $_FILES["$fileName"]["error"] . "<br />";
      }else {
            echo "</br>----------</br>Upload: " . $_FILES["$fileName"]["name"] . "<br />";
            echo "Type: " . $_FILES["$fileName"]["type"] . "<br />";
            echo "Size: " . ($_FILES["$fileName"]["size"] / 1024) . " Kb<br />";
            echo "Temp userfile: " . $_FILES["$fileName"]["tmp_name"] . "<br />";

            # verifica esistenza del file nella direcory del server per evitare sovrascritture
            if (file_exists(DIR_IMG . $_FILES["$fileName"]["name"])){
                  echo $_FILES["$fileName"]["name"] . " already exists. ";
            } else{
                  move_uploaded_file($_FILES["$fileName"]["tmp_name"],
                  DIR_IMG . "/" . $_FILES["$fileName"]["name"]);
                  echo "New Stored in: " . DIR_IMG . "/" . $_FILES["$fileName"]["name"];
            }
      }
    } else {
      echo "Invalid file";
    }
}


	// recupero i dati
	$nome=$_POST["nome"];
	$cognome=$_POST["cognome"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$nick_name=$_POST["nick_name"];
	if (isset($_FILES["avatar"])) {
		checkFile("avatar");
		$nomeImg=$_FILES["avatar"]["name"];
	}else {
		$nomeImg="NULL";
	}

	//Connessione al DB
	echo "<p>connetto al db...</p>";
	$link=mysqli_connect( "$db_host", "$db_login","$db_pass")
	or die ("Non riesco a connettermi a <b>$db_host");

	//Selezione il DB da utilizzare
	//mysqli_select_db ($database, $link)
	mysqli_select_db ($link, $database)
	or die ("Non riesco a selezionare il db $database<br>");

	//Preparo la Query
	$dati= " INSERT INTO utenti VALUES ('$nome',
					    '$cognome',
					    '$nick_name',
					    '$email',
					    MD5('$password'),
					    '$nomeImg');";
	//Eseguo la query
	mysqli_query ($link, $dati)
	or die ("Non riesco ad eseguire la query $dati" . mysqli_error($link));

	Echo " <CENTER><H1>$nome $cognome <BR><H3>I Dati sono stati archiviati con successo nel DataBase </CENTER> ";

	//Chiudo la connessione
	mysqli_close ($link);

?>
<a href="gestioneUtenti.html">Torna alla pagina home</a>

</body>
</html>
