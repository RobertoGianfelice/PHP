<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Stampa Registro</title>
  </head>
  <body>
    <?php
      if (count($_SESSION)>0) {
      echo "<table border=1 width=30%>";
      foreach ($_SESSION["Voti"] as $nome => $voti) {
        echo "<tr>";
        echo "<td>" . $nome . "</td>";
        echo "<td>";
        echo "<table border=1 width=100%>";
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
    <br>
    <h2><a href="RegistroVoti.html">HOME</a></h2>

  </body>
</html>
