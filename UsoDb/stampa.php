<html>
<head><title>Registrazione dati</title></head>
<body>
<?php
	//Include i dati di accesso a dbms e db
	include 'vars.php';
?>
<H1> Elenco Alunni</H1><BR>
<?php
	$matricola=$_GET["matr"];
	//Connessione al DB
	echo "<p>connetto al db...</p>";
	$link=mysqli_connect( "$db_host", "$db_login","$db_pass")
	or die ("Non riesco a connettermi a <b>$db_host");

	//Selezione il DB da utilizzare
	mysqli_select_db ($link, $database)
	or die ("Non riesco a selezionare il db $database<br>");

	//Preparo la Query
	$dati= " SELECT cd_classe
					 from alunni
		 			 where matr='$matricola';";

	//Eseguo la query
	$rs=mysqli_query ($link, $dati)
	or die ("Non riesco ad eseguire la query $dati");

	//Recupero il numero di righe nel cursore del risultato
	$nr = mysqli_num_rows($rs);

  if ($nr == 1){    //Ci sono delle righe nella tabella
	  $row = mysqli_fetch_assoc($rs);
	  $cd_classe=$row["cd_classe"];

	  $dati= " SELECT nome, cognome
		         from alunni
		         where cd_classe='$cd_classe';";

    //Eseguo la query
    $rs=mysqli_query ($link, $dati)
    or die ("Non riesco ad eseguire la query $dati");

    //Recupero il numero di righe nel cursore del risultato
    $nr = mysqli_num_rows($rs);

	  if ($nr>0){
      //Preparo la struttura della tabella
      echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">Utenti registrati </H1><BR>";

      echo "<table border=1>";
      echo "  <th>Nome</th><th>Cognome</th>";
      //Ciclo sul risultato e costruisco le tr della tabella
      for($x = 0; $x < $nr; $x++){
        $row = mysqli_fetch_assoc($rs);
        echo "<tr>";
          echo "<td>" . $row['nome'] . "</td>";
          echo "<td>" . $row['cognome'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
		}
	} else {
    echo "<h2>Utente non prensete nel db</h2>";
	}

	//Chiudo la connessione
	mysqli_close ($link);

?>
<br>
</body>
</html>
