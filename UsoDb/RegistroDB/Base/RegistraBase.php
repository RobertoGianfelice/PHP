<?php
  session_start();
  include "vars.php";
?>
<html>
  <body>
    <?php
      //Acquisico i dati parametri di input
      if (!isset($_GET["nome"]) || $_GET["nome"]=="" ||
          !isset($_GET["voto"]) || $_GET["voto"]=="" ) {
        echo "<h2>Dati di input mancanti </h2>";
      } else {
        // recupero i dati
        $nome=$_GET["nome"];
        $voto = $_GET["voto"];

      	echo "Dati ricevuti: $nome $voto";
      	$link=mysqli_connect(
      	    $db_host,
      	    $db_login,
      	    $db_pass,
      	    $database
      	) or die('Attenzione: Errore connessione al database');

      	$dati= " INSERT INTO discenti VALUES (
      					    '$nome',
      					    '$voto'
      					    );";
      	mysqli_query ($link, $dati)
      	or die ("Non riesco ad eseguire la query $dati");
      	echo " <CENTER><H1>$nome con voto $voto <BR><H3>I Dati sono stati archiviati con successo nel DataBase </CENTER> ";
      	mysqli_close ($link);

        echo "Aggiunto il voto <br>";
      }
    ?>
    <br>
    <h2><a href="RegistroVotiBase.html">HOME</a></h2>
  </body>
</html>
