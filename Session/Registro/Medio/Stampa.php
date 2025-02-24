<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Stampa Registro</title>
  </head>

  <body style="background-color: lightgreen">
    <?php
    if (count($_SESSION) > 0) {
      // Il registro voti esiste: lo stampo
      echo "<table border=1 width=30%>";
      // Tabella principale: una riga per ogni nome
      foreach ($_SESSION as $nome => $voti) {
        echo "<tr>";
        echo "<td>" . $nome . "</td>";
        echo "<td>";
        echo "<table border=1 width=100%>";
        // Tabella secondaria: una riga per ogni votazione
        foreach ($voti as $materia => $voto) {
          echo "<tr>";
          echo "<td>" . $materia . "</td>";
          echo "<td>" . $voto . "</td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Il registro è vuoto";
    }
    ?>
  </body>

</html>