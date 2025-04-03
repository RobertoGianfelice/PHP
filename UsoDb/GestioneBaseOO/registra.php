<?php   //dati accesso al db
	include "vars.php";
?>
<html>
<head><title>Registrazione dati</title></head>
<body>
<H1> Esecuzione registrazione su DB OO</H1><BR>
<?php
if (isset($_POST["nome"])){
	// recupero i dati
	$nome=$_POST["nome"];
	$cognome=$_POST["cognome"];
	$email=$_POST["email"];
	$nick=$_POST["nick"];
	$passw=$_POST["passwd"];

	//Recupero username e password dal form
	$username=$_POST["nome"];
	$password=md5($_POST["password"]);

	try {
	$conn = new mysqli($db_host, $db_login, $db_pass, $db_name);
	} catch (mysqli_sql_exception $e) {
                die ("Problemi!!! Problemi!!! " . $e->getMessage());
    }
	// Check connection

	$dati= " INSERT INTO utenti (nome, cognome, email, nick, passwd) 
	                    VALUES (
					    '$nome',
					    '$cognome',
					    '$email',
					    '$nick',
					    '$password'
					    );";
	try {
		$rs =  $conn->query ($dati);
	} catch (mysqli_sql_exception $e) {
                die ("Problemi!!! Problemi!!! " . $e->getMessage());
	} 	
	echo " <CENTER><H1>$nome $cognome <BR><H3>I Dati sono stati archiviati con successo nel DataBase </CENTER> ";
	$conn->close();
}
?>
<br>
<a href="menu.html">Torna alla pagina home</a>

</body>
</html>
