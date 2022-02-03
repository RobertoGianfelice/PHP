<?php
  session_start();
  include "vars.php";
?>
<html>
  <body>
    <?php
      //Connessione al DB
      echo "<p>connetto al db...</p>";
      $link=mysqli_connect( "$db_host", "$db_login","$db_pass")
      or die ("Non riesco a connettermi a <b>$db_host");

      //Selezione il DB da utilizzare
      mysqli_select_db ($link, $database)
      or die ("Non riesco a selezionare il db $database<br>");

      if (isset($_GET["cancellaTutto"])) {
        //Preparo la Query
        $dati= "DELETE from discenti";
      } else {
        $nome=$_GET["nome"];
        $dati= "DELETE from discenti where nome=\"$nome\"";
      }

      //Eseguo la query
      $rs=mysqli_query ($link, $dati)
      or die ("Non riesco ad eseguire la query $dati");

      //Recupero il numero di righe nel cursore del risultato
      $nr = mysqli_affected_rows($link);

      if ($nr != 0){    //Ci sono delle righe nella tabella
        //Preparo la struttura della tabella
          echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">Utenti cancellati $nr </H1><BR>";
       }else{  //La tabella è vuota
         if (isset($_GET["cancellaTutto"])) {
              echo "Nessun record da cancellare! Il registro è vuoto";
         } else {
           echo "$nome non presente nel registro";
         }
      }
      //Chiudo la connessione
      mysqli_close ($link);
    ?>
    <br>
    <h2><a href="RegistroVotiBase.html">HOME</a></h2>

  </body>
</html>
