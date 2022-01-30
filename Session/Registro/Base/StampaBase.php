<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Stampa Registro</title>
  </head>
  <body>
    <?php
      if (count($_SESSION)>0) {
      // Il registro voti esiste: lo stampo
      echo "<table border=1 width=30%>";
      // Tabella principale: una riga per ogni nome
      foreach ($_SESSION as $nome => $voto) {
        echo "<tr>";
        echo "<td>" . $nome . "</td>";
        echo "<td>" . $voto . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Il registro è vuoto";
    }

    ?>
    <br>
    <h2><a href="RegistroVotiBase.html">HOME</a></h2>

  </body>
</html>
