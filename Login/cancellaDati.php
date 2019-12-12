<?php 
session_start();
?>
<html>
<head><title>Cancella dati</title></head>
<body>
<?php 
	//Rimuovo la sessione
	session_unset();
	echo "<b>Dati cancellati</b>"
?>
	</br><a href="Registro.html">HOME</a>
</body>
</html> 
