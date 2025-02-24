<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Stampa Registro</title>
  <style media="screen">
    .pari {
      background-color: red;
    }

    .dispari {
      background-color: gray;
    }
  </style>
</head>

<body style="background-color: lightcoral;">
  <?php
  if (count($_SESSION) > 0) {
    // Il registro voti esiste: lo stampo
    echo "<table border=1 width=30%>";
    // Tabella principale: una riga per ogni nome
    $riga = 1;
    foreach ($_SESSION as $nome => $voto) {
      if ($riga % 2 == 0) {
        echo "<tr class=\"pari\">";
      } else {
        echo "<tr class=\"dispari\">";
      }
      echo "<td>" . $nome . "</td>";
      echo "<td>" . $voto . "</td>";
      echo "</tr>";
      $riga += 1;
    }
    echo "</table>";
  } else {
    echo "<h2>Il registro è vuoto</h2>";
  }

  ?>
  <br>
  <h2><a href="RegistroVotiBase.html">HOME</a></h2>

</body>

</html>