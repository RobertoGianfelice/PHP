<html>
<head><title>Registrazione dati</title></head>
<body>
<?php
	include 'vars.php';
?>
<H1> Esecuzione del file registrazione</H1><BR>
<?php
	//Apro la sessione php...
	session_start();

	// recupero i dati
	$cognome=$_POST["cognome"];

	//Connessione al DB
	echo "<p>connetto al db...</p>";
	$link=mysqli_connect( "$db_host", "$db_login","$db_pass")
	or die ("Non riesco a connettermi a <b>$db_host");

	//Selezione il DB da utilizzare
	mysqli_select_db ($link, $database)
	or die ("Non riesco a selezionare il db $database<br>");

	//Preparo la Query
	$dati= " DELETE from UTENTI where cognome='$cognome';";
	//Eseguo la query
	mysqli_query ($link, $dati)
	or die ("Non riesco ad eseguire la query $dati");

	if (mysqli_affected_rows($link)>0) {
		Echo " <CENTER><H1>Eliminato $cognome </H1></CENTER> ";
 	} else {
		Echo " <CENTER><H1>$cognome non presente nell'elenco degli utenti</H1></CENTER> ";
	}
	//Chiudo la connessione
	mysqli_close ($link);

?>
<a href="gestioneUtentiFull.html">Torna alla pagina home</a>

</body>
</html>
