<html>
<head><title>Registrazione dati</title></head>
<body>
<H1> Esecuzione del file registrazione</H1><BR>
<?php 
//Apro la sessione e...
session_start();
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

	// dati accesso db
	$db_host= "127.0.0.1:3306";
	$db_login= "admin";
	$db_pass= "admin";
	$database= "dbTest";

	//Salvo i dati...
	$_SESSION["username"]=$username;
	$_SESSION["password"]=$password;

	$link=mysqli_connect(
	    $db_host,
	    $db_login,
	    $db_pass,
	    $database
	) or die('Error connecting to database');

	$dati= " INSERT INTO utenti VALUES (
					    '$nome', 
					    '$cognome',
					    '$email',
					    '$nick',
					    '$password'
					    );"; 
	mysqli_query ($link, $dati) 
	or die ("Non riesco ad eseguire la query $dati"); 
	echo " <CENTER><H1>$nome $cognome <BR><H3>I Dati sono stati archiviati con successo nel DataBase </CENTER> ";
	mysqli_close ($link); 
}	 
?>
</body>
</html> 
