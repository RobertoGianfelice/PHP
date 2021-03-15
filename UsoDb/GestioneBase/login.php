<html>
<head><title>Registrazione dati</title></head>
<body>
<?php
	// Include le credenziali di accesso al db
        include "vars.php";
?>
<H1> Login</H1><BR>
<?php
	//Apro la sessione php...
	session_start();

	// recupero i dati
	$email=$_POST["email"];
	$password=$_POST["password"];

	//Connessione al DB
	echo "<p>connetto al db...</p>";
	$link=mysqli_connect( "$db_host", "$db_login","$db_pass")
	or die ("Non riesco a connettermi a <b>$db_host" . mysqli_error());

	//Selezione il DB da utilizzare
	mysqli_select_db ($link, $database)
	or die ("Non riesco a selezionare il db $database<br>" . mysqli_error());

	//Preparo la Query
	$dati= "SELECT nome
          FROM utenti
          where email='$email' and password=MD5('$password');";
	//Eseguo la query
	$rs=mysqli_query ($link, $dati)
	or die ("Non riesco ad eseguire la query $dati" . mysqli_error());

	//Recupero il numero di righe nel cursore del risultato
  $nr = mysqli_num_rows($rs);

  if ($nr == 1){    //Ci sono delle righe nella tabella
        $row = mysqli_fetch_assoc($rs);
        echo "Bentornato " . $row['nome'];
  }else{  //La tabella è vuota
        echo "Credenziali di accesso errate ";
	}

	//Chiudo la connessione
	mysqli_close ($link);

?>
<br>
<a href="gestioneUtentiFull.html">Torna alla pagina home</a>

</body>
</html>
