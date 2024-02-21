<?php   //dati accesso al db
	include "vars.php";
?>
<html>
<head><title>Registrazione dati</title></head>
<body>
<H1> Esecuzione del file registrazione</H1><BR>
<?php
if (isset($_POST["nome"])){

	// recupero i dati
	$nome=$_POST["nome"];
	$cognome=$_POST["cognome"];
	$email=$_POST["email"];
	$nick=$_POST["nick_name"];
	$passw=$_POST["password"];

	//Recupero username e password dal form
	$username=$_POST["nome"];
	$password=md5($_POST["password"]);

	echo "$nome $cognome $email $nick $passw";
	$conn = new mysqli($db_host, $db_login, $db_pass, $database);
	// Check connection
	if ($conn->connect_error ) {
		die ("PRoblemi di connessione a $db_host " . $conn->connect_error);
	}

	$dati= " INSERT INTO utenti (nome, cognome, email, nick_name, password) 
	                    VALUES (
					    '$nome',
					    '$cognome',
					    '$email',
					    '$nick',
					    '$password'
					    );";
	$rs =  $conn->query ($dati);
	if ($conn->connect_error) {
		die ("Problemi nell'eseguire la quesry $dati " . $conn->connect_error);
	}
	echo " <CENTER><H1>$nome $cognome <BR><H3>I Dati sono stati archiviati con successo nel DataBase </CENTER> ";
	$conn->close();
}
?>
<br>
<a href="gestioneUtentiBase.html">Torna alla pagina home</a>

</body>
</html>
