<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Stampa archivio</title>
</head>

<body>
  <?php
  if (count($_SESSION) > 0) {
    echo "<h2>Archivio</h2>";
    echo "<table border=1 width=30%>";
    foreach ($_SESSION as $cf=>$valore) {
        echo "<tr>";
        echo "<td> $cf </td>";
        echo "<td>  <a href=\"stampaScheda.php?cf=" . $cf ."\">guarda la scheda</a>";
        echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "Il registro è vuoto";
  }

  ?>
  <br>
  <h2><a href="Menu.html">HOME</a></h2>

</body>

</html>