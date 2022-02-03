<?php
  session_start();
  include "vars.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Stampa Registro</title>
    <style media="screen">
      #pari{
        background-color:red;
      }
      #dispari{
        background-color:gray;
      }
    </style>
  </head>
  <body>
    <?php
      //Connessione al DB
    	echo "<p>connetto al db...</p>";
    	$link=mysqli_connect( "$db_host", "$db_login","$db_pass")
    	or die ("Non riesco a connettermi a <b>$db_host");

    	//Selezione il DB da utilizzare
    	mysqli_select_db ($link, $database)
    	or die ("Non riesco a selezionare il db $database<br>");

    	//Preparo la Query
    	$dati= " SELECT nome, voto
                     from discenti";

    	//Eseguo la query
    	$rs=mysqli_query ($link, $dati)
    	or die ("Non riesco ad eseguire la query $dati");

    	//Recupero il numero di righe nel cursore del risultato
    	$nr = mysqli_num_rows($rs);

      if ($nr != 0){    //Ci sono delle righe nella tabella
    	  //Preparo la struttura della tabella
          echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">Utenti registrati </H1><BR>";

          echo "<table border=1 width=30%>";
    	    echo "  <th>Nome</th><th>Cognome</th>";
    	    //Ciclo sul risultato e costruisco le tr della tabella
    	    for($x = 0; $x < $nr; $x++){
            $row = mysqli_fetch_assoc($rs);
            if ($x%2==0) {
              echo "<tr id=\"pari\">";
            } else {
              echo "<tr id=\"dispari\">";
            }
    	        echo "<td>" . $row['nome'] . "</td>";
    	        echo "<td>" . $row['voto'] . "</td>";
    	      echo "</tr>";
    	    }
          echo "</table>";

       }else{  //La tabella è vuota
              echo "Nessun record trovato! Il registro è vuoto";
    	}

    	//Chiudo la connessione
    	mysqli_close ($link);
    ?>
    <br>
    <h2><a href="RegistroVotiBase.html">HOME</a></h2>

  </body>
</html>
