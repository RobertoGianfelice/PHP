<?php
  session_start();
  include "vars.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Status Macchina</title>
    <meta http-equiv="refresh" content="2">

  </head>
  <body>
    <?php
      //Connessione al DB
    	$link=mysqli_connect(
        "$db_host",
        "$db_login",
        "$db_pass")
    	or die ("Non riesco a connettermi a <b>$db_host");

    	//Selezione il DB da utilizzare
    	mysqli_select_db ($link, $database)
    	or die ("Non riesco a selezionare il db $database<br>");
      if (isset($_GET["nick"])) {
        $nickPilota=$_GET["nick"];
      } else {
        $nickPilota="%";
      }
    	//Preparo la Query
    	$dati= " SELECT *
                from muretto
                where nickPilota like '$nickPilota'";

    	//Eseguo la query
    	$rs=mysqli_query ($link, $dati)
    	or die ("Non riesco ad eseguire la query $dati");

    	//Recupero il numero di righe nel cursore del risultato
    	$nr = mysqli_num_rows($rs);
      $options="";
      if ($nr != 0){    //Ci sono delle righe nella tabella
    	  //Preparo la struttura della tabella
          echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">DATI MURETTO </H1><BR>";
          echo "<table border=1>";
          echo "<tr><th>nickPilota</th><th>throttle</th><th>resaGomme</th><th>fuel</th><th>powerOnLap</th><th>boxboxbox</th><td>tyre</td></tr>";
          for($x = 0; $x < $nr; $x++){
            $row = mysqli_fetch_assoc($rs);
              echo "<tr>";
                echo "<td>" , $row['nickPilota'], "</td>",
                     "<td>" , $row['throttle'], "</td>",
                     "<td>" , $row['resaGomme'], "</td>",
                     "<td>" , $row['fuel'], "</td>",
                     "<td>" , $row['powerOnLap'], "</td>",
                     "<td>" , $row['boxboxbox'], "</td>",
                     "<td>" , $row['tyre'], "</td>";
              echo "</tr>";
              $options=$options . "<option value=" . $row['nickPilota'] . ">" . $row['nickPilota'] . "</option>";
          }
          echo "</table>";

       }else{  //La tabella è vuota
              echo "Nessun record trovato! Pilota non presente";
    	}
    	//Chiudo la connessione
    	mysqli_close ($link);
      print($options);
    ?>
  </body>
</html>
