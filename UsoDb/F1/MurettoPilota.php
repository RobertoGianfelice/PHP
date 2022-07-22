<?php
  session_start();
  include "vars.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SetUp Macchina</title>
  </head>
  <body>
    <?php
      //Connessione al DB d
    	$link=mysqli_connect(
        "$db_host",
        "$db_login",
        "$db_pass")
    	or die ("Non riesco a connettermi a <b>$db_host");

    	//Selezione il DB da utilizzare
    	mysqli_select_db ($link, $database)
    	or die ("Non riesco a selezionare il db $database<br>");
      if (!isset($_GET["nick"])) {
        echo "<h1>Pilota non specificato</h1>";
        exit;
      } else {
        $nickPilota=$_GET["nick"];
      }
      if (isset($_GET["throttle"])) {
        $throttle=$_GET["throttle"];
      } else {
        $throttle=100;
      }
      $updateString="";
      foreach ($_GET as $key => $value) {
        if ($key!="nick" and $key!="NewSetup") {
          if ($updateString!=""){
            $updateString.=", ";
          }
          $updateString.=" $key = \"$value\" ";
        }
      }
      if (isset($_GET["NewSetup"])) {
    	   //Preparo la Query
    	   $dati= "update muretto set " . $updateString . "where nickPilota = '$nickPilota'";
      	//Eseguo la query
      	$rs=mysqli_query ($link, $dati)
      	or die ("Non riesco ad eseguire la query $dati");
      }

    	//Preparo la Query
    	$dati= " SELECT *
                from muretto
                where nickPilota = '$nickPilota'";

    	//Eseguo la query
    	$rs=mysqli_query ($link, $dati)
    	or die ("Non riesco ad eseguire la query $dati");

    	//Recupero il numero di righe nel cursore del risultato
    	$nr = mysqli_num_rows($rs);
      $options="";
      if ($nr != 0){    //Ci sono delle righe nella tabella
    	  //Preparo la struttura della tabella
          echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">SETUP MACCHINA $nickPilota</H1><BR>";
          echo "<table border=1>";
          echo "<tr><th>nickPilota</th><th>throttle</th><th>resaGomme</th><th>fuel</th><th>powerOnLap</th><th>boxboxbox</th><th>tyre</td></tr>";
          for($x = 0; $x < $nr; $x++){
            $row = mysqli_fetch_assoc($rs);
              echo "<tr>",
                    "<td>" , $row['nickPilota'], "</td>",
                     "<td>" , $row['throttle'], "</td>",
                     "<td>" , $row['resaGomme'], "</td>",
                     "<td>" , $row['fuel'], "</td>",
                     "<td>" , $row['powerOnLap'], "</td>",
                     "<td>" , $row['boxboxbox'], "</td>",
                     "<td>" , $row['tyre'], "</td>";
              echo "</tr>";
          }
          echo "</table>";
       }else{  //La tabella è vuota
              echo "Nessun record trovato! Pilota non presente";
    	}
    	//Chiudo la connessione
    	mysqli_close ($link);
      print($options);
    ?>
    <form  method="get">
      <input type="hidden" name="nick" value=<?php echo $_GET["nick"]?> >
      <br>
      Throttle:
      <label for="throttle">Percentage (between 0% and 100%):</label>
      <input type="number" id="throttle" name="throttle" min="0" max="100" value="50">
      <br>
      Order:
      <input type="radio" id="boxbox" name="boxboxbox" value="1">
      <label for="Box Box Box">Box Box Box!!!</label>
      <input type="radio" id="boxbox" name="boxboxbox" value="0" checked="checked">
      <label for="Stay Out">Stay Out</label><br>


      <input type="submit" value="Submit" name="NewSetup">
    </form>
  </body>
</html>
