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

	Echo " <CENTER><H1>Eliminato $cognome </H1> </CENTER> ";

	//Chiudo la connessione
	mysqli_close ($link); 
	 
?>
<a href="gestioneUtenti.html">Torna alla pagina home</a>

</body>
</html> 
