<?php
  session_start();
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
      if (count($_SESSION)>0) {
      // Il registro voti esiste: lo stampo
      echo "<table border=1 width=30%>";
      // Tabella principale: una riga per ogni nome
      $riga=1;
      foreach ($_SESSION as $nome => $voto) {
        if ($riga%2==0) {
          echo "<tr id=\"pari\">";
        } else {
          echo "<tr id=\"dispari\">";
        }
          echo "<td>" . $nome . "</td>";
          echo "<td>" . $voto . "</td>";
        echo "</tr>";
        $riga+=1;
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
