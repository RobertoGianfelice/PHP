<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Stampa Partite</title>
</head>

<body>
  <?php

  if (count($_SESSION) > 0) {
    foreach ($_SESSION as $giornata => $partite) {
      echo "<h2>$giornata</h2>";
      echo "<table border=1 width=30%>";

      foreach ($partite as $partita => $risultati) {
        echo "<tr>";
        echo "<td>" . $partita . "</td>";
        echo "<td>";
        echo "<table border=1 width=100%>";
        // Tabella secondaria: una riga per ogni votazione del nome in esame
        foreach ($risultati as $parametro => $valore) {
          echo "<tr>";
          echo "<td>" . $parametro . "</td>";
          echo "<td>" . $valore . "</td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
  } else {
    echo "Il registro è vuoto";
  }

  ?>
  <br>
  <h2><a href="RegistroPartite.html">HOME</a></h2>

</body>

</html>