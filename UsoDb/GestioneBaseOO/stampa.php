<html>

<head>
	<title>Registrazione dati</title>
</head>

<body>
	<?php
	//Include i dati di accesso a dbms e db
	include 'vars.php';
	?>
	<H1> Stampa Utenti</H1><BR>
	<?php
	//Connessione al DB
	echo "<p>connetto al db...</p>";

	try {
		$conn = new mysqli($db_host, $db_login, $db_pass, $db_name);
	} catch (mysqli_sql_exception $e) {
		die("Problemi!!! Problemi!!! " . $e->getMessage());
	}
	//Preparo la Query
	$dati = " SELECT nome, cognome, nick
                 from utenti";

	//Eseguo la query
	try {
		$rs = $conn->query($dati);
	} catch (mysqli_sql_exception $e) {
		die("Problemi!!! Problemi!!! " . $e->getMessage());
	}

	//Recupero il numero di righe nel cursore del risultato
	$nr = $rs->num_rows;

	if ($nr != 0) {    //Ci sono delle righe nella tabella
		//Preparo la struttura della tabella
		echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">Utenti registrati </H1><BR>";

		echo "<table border=1>";
		echo "  <th>Nome</th><th>Cognome</th><th>Nick</th>";
		//Ciclo sul risultato e costruisco le tr della tabella
		for ($x = 0; $x < $nr; $x++) {
			$row = $rs->fetch_assoc();
			echo "<tr>";
			echo "<td>" . $row['nome'] . "</td>";
			echo "<td>" . $row['cognome'] . "</td>";
			echo "<td>" . $row['nick'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {  //La tabella è vuota
		echo "Nessun record trovato!";
	}

	//Chiudo la connessione
	$conn->close();

	?>
	<br>
	<a href="menu.html">Torna alla pagina home</a>
</body>

</html>