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
  $cf=$_GET["cf"];
  if (count($_SESSION) > 0 && isset($_SESSION[$cf])) {
    $persona=$_SESSION[$cf];

    echo "Codice Fiscale=" . $cf . "<br>";
    echo "Nome=". $persona["nome"] . "<br>";
    echo "Foto= <img src=\"" . $persona["foto"] ."\" width=\"200px\">";

  } else {
    echo "Il registro è vuoto";
  }

  ?>
  <br>
  <h2><a href="Menu.html">HOME</a></h2>

</body>

</html>