<?php 
session_start();
?>
<html>
<head><title>Cancella dati</title></head>
<body>
<?php 
	session_unset();
	echo "<b>Dati cancellati</b>"
?>
	<a href="Registro.html">Vai a inserimento dati</a>
</body>
</html> 
