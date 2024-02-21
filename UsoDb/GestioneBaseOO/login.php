<html>
<head><title>Registrazione dati</title></head>
<body>
<?php
	// Include le credenziali di accesso al db
        include "vars.php";
?>
<H1> Login OO</H1><BR>
<?php

	// recupero i dati
	$email=$_POST["email"];
	$password=$_POST["password"];

	//Connessione al DB
	echo "<p>connetto al db...</p>";
	$conn = new mysqli($db_host, $db_login, $db_pass, $database);
	// Check connection
	if ($conn->connect_error ) {
		die ("Problemi di connessione a $db_host " . $conn->connect_error);
	}
	//Preparo la Query
	$dati= "SELECT nome
          FROM utenti
          where email='$email' and password=MD5('$password');";
	//Eseguo la query
	$rs=$conn->query($dati);
	if ($conn->connect_error ) {
		die ("Non riesco ad eseguire la query $dati " . $conn->connect_error);
	}

	//Recupero il numero di righe nel cursore del risultato
    $nr =  $rs->num_rows;

    if ($nr == 1){    //Ci sono delle righe nella tabella
        $row = $rs->fetch_assoc(); 
        echo "Bentornato " . $row['nome'];
    }else{  //La tabella è vuota
        echo "Credenziali di accesso errate ";
	}
	//Chiudo la connessione
	$conn->close();

?>
<br>
<a href="gestioneUtentiBase.html">Torna alla pagina home</a>

</body>
</html>
