<html>
<head><title>Registrazione dati</title></head>
<body>
<?php
	include 'vars.php';
?>
<H1> Esecuzione del file registrazione</H1><BR>
<?php
	// recupero i dati
	$cognome=$_POST["cognome"];

	//Connessione al DBMS e selezione il DB
	echo "<p>connetto al db...</p>";
	$conn = new mysqli($db_host, $db_login, $db_pass, $database);
	// Check connection
	if ($conn->connect_error ) {
		die ("PRoblemi di connessione a $db_host " . $conn->connect_error);
	}
		//Preparo la Query
	$dati= " DELETE from UTENTI where cognome='$cognome';";
	//Eseguo la query
	$conn->($dati);
	if ($conn->connect_error ) {
		die ("Non riesco ad eseguire la query $dati " . $conn->connect_error);
	}

	if ($conn->affected_rows > 0) {
		Echo " <CENTER><H1>Eliminato $cognome </H1></CENTER> ";
 	} else {
		Echo " <CENTER><H1>$cognome non presente nell'elenco degli utenti</H1></CENTER> ";
	}
	//Chiudo la connessione
	$conn->close();

?>
<a href="gestioneUtentiFull.html">Torna alla pagina home</a>

</body>
</html>
