<?php 
	session_start();
	$DEBUG=FALSE;
?>
<html>
<head><title>Registrazione dati</title></head>
<body>
<?php 
	//Verifico se i dati ci sono
	if ((!isset($_GET["login"]) or ($_GET["login"]=="")) or 
            (!isset($_GET["password"]) or ($_GET["password"]=="")) ) {
		exit("Specificare dati, please");
	}

	// recupero i dati
	$login=$_GET["login"];
	$password=$_GET["password"];

	if ($DEBUG) {
		echo "<h1> Questi sono i dati ricevuti</h1>";
		echo "<ul>";
		echo "<li>login=$login</li>";
		echo "<li>password=$password</li>";
		echo "</ul>";
	}
		
	//Verifico se l'array utenti è presente in session. Se non presente, lo creo
	if (!isset($_SESSION["utenti"])){
		$_SESSION["utenti"]=[];
	}

	//Verifico che l'utente specificato non sia già registrato
	$logins=$_SESSION["utenti"];
	if (isset($logins[$login])) {
		echo "<h3>Utente " . $login . " gia' registrato </h3>";
	} else {
		//Utente non registrato: provvedo a registrarlo
		//Salvo la password per il login specificato
		//La password è criptata
		$_SESSION["utenti"][$login]=password_hash($password, PASSWORD_DEFAULT);
		echo "<h3>Utente " . $login . " registrato </h3>";
		if ($DEBUG) {
			//Stampo, per debugging la lista degli utenti registrati
			echo "<ol>";
			$logins=$_SESSION["utenti"];
			foreach ($logins as $loginCorrente=>$passwordCorrente) {
				echo "<li>";
					echo "<ul>";
						echo "<li>login=$loginCorrente</li>";
						echo "<li>pass=$passwordCorrente</li>";
					echo "</ul>";
				echo "</li>";
			}
			echo "</ol>";
			//Stampo per debuggin la session attiva
			print_r($_SESSION);
		}
	}
?>
</body>
</html> 
