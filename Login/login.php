<?php 
	session_start();
	include "myFunctions.php";
?>
<html>
<head><title>Ricerca dati</title></head>
<body>
<?php 
	//Verifico se i dati ci sono
        if (!isset($_GET["login"]) or  
            !isset($_GET["password"]) ) {
                exit("Specificare dati, please");
        }

	// recupero i dati
	$login=$_GET["login"];
	$password=$_GET["password"];
	
	//Stampo i dati ricevuti
	myecho ("<h1> Questi sono i dati ricevuti</h1>");
	//Salvo i dati...
	myecho ("<ul>");
	myecho ("<li>login=$login</li>");
	myecho ("<li>password=$password</li>");
	myecho ("</ul>");

	//Dopo aver verificato che ci siano dati nell'array "utenti", verifico la password
	if (isset($_SESSION["utenti"]) and isset($_SESSION["utenti"][$login])) {
		$passRegistrata=$_SESSION["utenti"][$login];
		//Verifico la password crittografata
		if (password_verify($password, $passRegistrata)) {
			echo "<p><b>Login effettuato: Bentornato " . $login . " </b></p>";
		} else {
			echo "<p><b>Login NON effettuato </b></p>";
		}
	} else { 
		//Se non ci sono login, sicuramente rifiuto l'accesso senza fornire indicazioni
		echo "<p><b>Login NON effettuato </b></p>";
	}
?>
        </br><a href="Registro.html">HOME</a>

</body>
</html> 
